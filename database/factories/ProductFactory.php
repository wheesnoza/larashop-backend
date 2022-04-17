<?php declare(strict_types=1);

namespace Database\Factories;

use App\Shared\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

final class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'uuid' => $this->faker->unique()->uuid(),
            'name' => $this->faker->sentence(),
            'description' => $this->faker->text(),
        ];
    }
}
