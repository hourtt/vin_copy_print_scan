<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrinterModel extends Model
{
    //
    protected $fillable = [
        'brand_id',
        'model_name',
        'slug',
    ];
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
