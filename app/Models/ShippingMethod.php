<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{
    protected $fillable = [
        'name',
        'description',
        'fee',
        'estimated_days',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'fee'       => 'decimal:2',
    ];

    /**
     * Scope to only return active shipping methods.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Orders that use this shipping method.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
