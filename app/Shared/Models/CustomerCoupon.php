<?php declare(strict_types=1);

namespace App\Shared\Models;

use Illuminate\Database\Eloquent\Model;

final class CustomerCoupon extends Model
{
    protected $fillable = [
        'customer_id',
        'coupon_id',
        'expire_at'
    ];
}
