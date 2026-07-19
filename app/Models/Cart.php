<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int $item_count
 * @property-read float $subtotal
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CartItem> $items
 * @property-read int|null $items_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereUserId($value)
 * @mixin \Eloquent
 */
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
