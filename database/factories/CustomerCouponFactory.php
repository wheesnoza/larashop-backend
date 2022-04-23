<?php declare(strict_types=1);

namespace Database\Factories;

use App\Shared\Models\CustomerCoupon;
use Illuminate\Database\Eloquent\Factories\Factory;

final class CustomerCouponFactory extends Factory
{
    protected $model = CustomerCoupon::class;

    public function definition(): array
    {
        return [
            'id' => snowflake(),
            'customer_id' => new CustomerFactory(),
            'coupon_id' => new CouponFactory(),
            'expire_at' => now()->addDays(5),
        ];
    }
}
