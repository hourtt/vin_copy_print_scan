<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
    ];

    /**
     * The cart this item belongs to.
     */
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    /**
     * The product for this cart item.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Line subtotal for this item.
     */
    public function getSubtotalAttribute(): float
    {
        return $this->quantity * $this->product->price;
    }
}
