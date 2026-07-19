<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property numeric $fee
 * @property int $estimated_days
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod active()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereEstimatedDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ShippingMethod withoutTrashed()
 * @mixin \Eloquent
 */
class ShippingMethod extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'fee',
        'estimated_days',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'fee'       => 'decimal:2',
    ];

    /**
     * Scope to only return active shipping methods.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Orders that use this shipping method.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
