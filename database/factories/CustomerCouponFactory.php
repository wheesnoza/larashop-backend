<?php

namespace Database\Factories;

use App\Shared\Models\CustomerCoupon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerCouponFactory extends Factory
{
    protected $model = CustomerCoupon::class;

    public function definition(): array
    {
        return [
            'customer_id' => new CustomerFactory(),
            'coupon_id' => new CouponFactory(),
            'expire_at' => now()->addDays(5),
        ];
    }
}
