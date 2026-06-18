<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'logo',
    ];

    /**
     * All products belonging to this brand.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * All printer models manufactured by this brand.
     */
    public function printerModels()
    {
        return $this->hasMany(PrinterModel::class);
    }
}
