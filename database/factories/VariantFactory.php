<?php declare(strict_types=1);

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

final class VariantFactory extends Factory
{
    public function definition()
    {
        return [
            'product_id' => Product::factory(),
            'uuid' => $this->faker->unique()->uuid(),
            'name' => $this->faker->sentence(),
            'price' => $this->faker->randomNumber(),
            'color' => $this->faker->randomElement(['red', 'blue']),
            'height' => $this->faker->randomFloat(),
            'width' => $this->faker->randomFloat(),
            'weight' => $this->faker->randomFloat(),
            'active' => $this->faker->boolean(),
        ];
    }
}
