<?php

namespace App\Shared\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerCoupon extends Model
{
    protected $fillable = [
        'customer_id',
        'coupon_id',
        'expire_at'
    ];
}
