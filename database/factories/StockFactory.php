<?php

namespace Database\Factories;

use App\Models\Variant;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockFactory extends Factory
{
    public function definition(): array
    {
        return [
            'variant_id' => Variant::factory(),
        ];
    }
}
