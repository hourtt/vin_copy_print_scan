<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrinterModel extends Model
{
    use HasFactory;

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
