<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $brand_id
 * @property string $model_name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Brand $brand
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PrinterModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PrinterModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PrinterModel query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PrinterModel whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PrinterModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PrinterModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PrinterModel whereModelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PrinterModel whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PrinterModel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
