<?php declare(strict_types=1);

namespace Database\Factories;

use App\Shared\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

final class CouponFactory extends Factory
{
    protected $model = Coupon::class;

    public function definition(): array
    {
        return [
            'id' => snowflake(),
            'code' => Str::random(6),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->text(),
            'type' => $type = $this->faker->randomElement([1, 2]),
            'content' => Arr::get([
                1 => [
                    'rate' =>  $this->faker->randomElement([0.05, 0.1, 0.2]),
                ],
                2 => [
                    'amount' => $this->faker->randomElement([500, 1000, 2000]),
                    'currency' => 'JPY',
                ]
            ], $type),
            'holding_period_start' => now(),
            'holding_period_end' => now()->addDays(5),
        ];
    }
}
