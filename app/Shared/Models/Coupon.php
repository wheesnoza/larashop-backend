<?php

namespace App\Shared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Src\Frontend\Coupon\Domain\CouponType;

class Coupon extends Model
{
    protected $fillable = [
        'code',
        'title',
        'description',
        'type',
        'content',
        'holding_period_start',
        'holding_period_end',
    ];

    protected $casts = [
        'content' => 'json',
        'type' => CouponType::class,
    ];

    public function customer(): BelongsToMany
    {
        return $this->belongsToMany(Customer::class, (new CustomerCoupon())->getTable());
    }
}
