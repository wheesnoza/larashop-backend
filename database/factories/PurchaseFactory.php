<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Variant;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'customer_id' => Customer::factory(),
            'variant_id' => Variant::factory(),
            'uuid' => $this->faker->unique()->uuid(),
            'state' => $this->faker->randomElement(['reserved', 'preparing', 'shipped', 'delivered']),
            'priority' => $this->faker->numberBetween(1, 3),
        ];
    }
}
