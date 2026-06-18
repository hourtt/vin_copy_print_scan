<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
    ];

    /**
     * The user who owns this cart.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * All items in this cart.
     */
    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * Products in this cart (via cart_items pivot).
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'cart_items', 'cart_id', 'product_id')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    /**
     * Total number of items in the cart.
     */
    public function getItemCountAttribute(): int
    {
        return $this->items()->sum('quantity');
    }

    /**
     * Cart subtotal calculated from products and quantities.
     */
    public function getSubtotalAttribute(): float
    {
        return $this->items->sum(fn ($item) => $item->quantity * $item->product->price);
    }
}
