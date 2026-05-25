<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'discount_type',
        'discount_value',
        'usage_limit',
        'used_count',
        'expires_at',
        'is_active'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'voucher_products', 'voucher_id', 'product_id');
    }
}
