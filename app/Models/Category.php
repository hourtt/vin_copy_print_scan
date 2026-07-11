<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'sort_order',
    ];

    public function resolveRouteBinding($value, $field = null)
    {
        // it check 2 conditions on the url : id & slug
        return $this->where('id', $value)->orWhere('slug', $value)->firstOrFail();
    }
    /**
     * One category has many products.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Vouchers that apply to this category.
     */
    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class, 'voucher_categories', 'category_id', 'voucher_id');
    }
}
