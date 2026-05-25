<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'model_year',
        'description',
        'price',
        'stock',
        'image'
    ];
    public function category()
    {
        //* one product belongs to one category
        return $this->belongsTo(Category::class);
    }

    public function voucher()
    {
        return $this->belongsToMany(Voucher::class, 'voucher_products', 'product_id', 'voucher_id');
    }
}
