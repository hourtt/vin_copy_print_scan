<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_date',
        'shipped_time',
        'subtotal',
        'shipping_method_id',
        'shipping_fee',
        'shipping_address',
        'estimated_delivery_date',
        'tracking_notes',
        'total',
        'status',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'order_date'              => 'datetime',
        'shipped_time'            => 'datetime',
        'estimated_delivery_date' => 'date',
        'subtotal'                => 'decimal:2',
        'shipping_fee'            => 'decimal:2',
        'total'                   => 'decimal:2',
    ];

    /**
     * Human-readable status labels for display in tracking UI.
     */
    public const STATUS_LABELS = [
        'pending'          => 'Order Received',
        'processing'       => 'Processing',
        'packed'           => 'Packed',
        'out_for_delivery' => 'Out for Delivery',
        'delivered'        => 'Delivered',
        'cancelled'        => 'Cancelled',
    ];

    // ─ Relationships 

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class, 'order_vouchers')
                    ->withPivot('discount_amount', 'applied_to_product_ids')
                    ->withTimestamps();
    }

    public function shippingMethod()
    {
        return $this->belongsTo(ShippingMethod::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    // ─ Helpers ─

    /**
     * Returns the human-readable status label.
     */
    public function getStatusLabelAttribute(): string
    {
        return self::STATUS_LABELS[$this->status] ?? ucfirst($this->status);
    }
}
