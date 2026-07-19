<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $code
 * @property string $scope
 * @property string $discount_type
 * @property numeric $discount_value
 * @property int|null $usage_limit
 * @property int $used_count
 * @property \Illuminate\Support\Carbon|null $expires_at
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Database\Factories\VoucherFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher whereDiscountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher whereDiscountValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher whereScope($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher whereUsageLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Voucher whereUsedCount($value)
 * @mixin \Eloquent
 */
class Voucher extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'scope',
        'discount_type',
        'discount_value',
        'usage_limit',
        'used_count',
        'expires_at',
        'is_active'
    ];

    protected $casts = [
        'is_active'   => 'boolean',
        'expires_at'  => 'datetime',
        'used_count'  => 'integer',
        'usage_limit' => 'integer',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'voucher_products', 'voucher_id', 'product_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'voucher_categories', 'voucher_id', 'category_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_vouchers')
                    ->withPivot('discount_amount', 'applied_to_product_ids')
                    ->withTimestamps();
    }

    // ─ Helpers ─

    /**
     * Whether this voucher has expired.
     */
    public function isExpired(): bool
    {
        return $this->expires_at && $this->expires_at->isPast();
    }

    /**
     * Whether this voucher has reached its usage limit.
     */
    public function isExhausted(): bool
    {
        return $this->usage_limit !== null && $this->used_count >= $this->usage_limit;
    }

    /**
     * Whether this voucher is currently usable.
     */
    public function isUsable(): bool
    {
        return $this->is_active && !$this->isExpired() && !$this->isExhausted();
    }
}
