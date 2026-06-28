<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
