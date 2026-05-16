<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id','order_date','shipped_time','subtotal','voucher_id','applied_voucher_discount','status','created_by','updated_by','total'
    ];
}
