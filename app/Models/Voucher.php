<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable =[
        'code','discount_type','discount_value','usage_limit','used_count','expires_at','is_active'
    ];
}
