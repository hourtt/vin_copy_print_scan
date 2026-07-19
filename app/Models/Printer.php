<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $brand_id
 * @property string $model_name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Brand $brand
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $compatibleProducts
 * @property-read int|null $compatible_products_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Printer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Printer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Printer query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Printer whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Printer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Printer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Printer whereModelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Printer whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Printer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Printer extends Model
{
    use HasFactory;

    /**
     * The actual database table (migration created 'printer_models', not 'printers').
     */
    protected $table = 'printer_models';

    protected $fillable = [
        'brand_id',
        'model_name',
        'slug',
    ];

    /**
     * The brand this printer model belongs to.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Products (toners, inks) compatible with this printer model.
     */
    public function compatibleProducts()
    {
        return $this->belongsToMany(
            Product::class,
            'product_compatible_models',
            'printer_model_id',
            'product_id'
        );
    }
}
