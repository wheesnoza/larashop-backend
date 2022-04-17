<?php declare(strict_types=1);

namespace Database\Factories;

use App\Shared\Models\Variant;
use Illuminate\Database\Eloquent\Factories\Factory;

final class VariantFactory extends Factory
{
    protected $model = Variant::class;

    public function definition(): array
    {
        return [
            'product_id' => new ProductFactory(),
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
