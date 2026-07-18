<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'slug',
        'description',
        'price',
        'discount_price',
        'stock',
        'sales_count',
        'image',
        'specifications',
        'is_featured',
    ];

    protected $casts = [
        'specifications' => 'array',
        'is_featured' => 'boolean',
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'sales_count' => 'integer',
    ];

    // ─ Relationships 

    /**
     * One product belongs to one category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * One product belongs to one brand (nullable).
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * A product can have many gallery images.
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    /**
     * Printer models this product (toner/ink) is compatible with.
     */
    public function compatibleModels()
    {
        return $this->belongsToMany(
            Printer::class,
            'product_compatible_models',
            'product_id',
            'printer_model_id'
        )->with('brand');
    }

    /**
     * Vouchers that can be applied to this product.
     */
    public function voucher()
    {
        return $this->belongsToMany(Voucher::class, 'voucher_products', 'product_id', 'voucher_id');
    }

    /**
     * Order items that reference this product.
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // ─ Scopes 

    /**
     * Only return featured products.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Only return in-stock products.
     */
    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);
    }

    /**
     * Order by most sold (descending).
     */
    public function scopePopular($query)
    {
        return $query->orderByDesc('sales_count');
    }

    /**
     * Only return products currently on sale.
     */
    public function scopeOnSale($query)
    {
        return $query->whereNotNull('discount_price')
            ->whereColumn('discount_price', '<', 'price');
    }

    /**
     * Order by newest first.
     */
    public function scopeNewArrivals($query)
    {
        return $query->latest();
    }

    // ─ Accessors / Helpers ─

    /**
     * Get stock status logic formatted for UI.
     */
    public function getStockStatusAttribute(): array
    {
        $stock = (int) $this->stock;
        $class = $stock <= 0 ? 'out-of-stock' : ($stock <= 5 ? "Low-stock" : "In-stock");

        $badgeBg = match ($class) {
            'In-stock' => 'bg-green-100 text-green-800',
            'Low-stock' => 'bg-yellow-100 text-yellow-800',
            default => 'bg-red-100 text-red-800',
        };

        return [
            'count' => $stock,
            'label' => $stock <= 0 ? 'Out of stock' : ($stock <= 5 ? "Only {$stock} left" : "In stock"),
            'badgeBg' => $badgeBg,
            'isAvailable' => $stock > 0,
        ];
    }
    /**
     * The price the customer actually pays (discount or regular).
     */
    public function getEffectivePriceAttribute(): string
    {
        return $this->discount_price ?? $this->price;
    }

    /**
     * Whether this product currently has an active discount.
     */
    public function getIsOnSaleAttribute(): bool
    {
        return $this->discount_price !== null && $this->discount_price < $this->price;
    }

    /**
     * Auto-generate slug from name if not set.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

}
