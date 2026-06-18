<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'image',
        'specifications',
        'is_featured',
    ];

    protected $casts = [
        'specifications' => 'array',
        'is_featured'    => 'boolean',
        'price'          => 'decimal:2',
    ];

    // ─── Relationships ────────────────────────────────────────────────────────

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
            PrinterModel::class,
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

    // ─── Scopes ──────────────────────────────────────────────────────────────

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

    // ─── Accessors / Helpers ─────────────────────────────────────────────────

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
