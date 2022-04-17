<?php declare(strict_types=1);

namespace Database\Factories;

use App\Shared\Models\Purchase;
use Illuminate\Database\Eloquent\Factories\Factory;

final class PurchaseFactory extends Factory
{
    protected $model = Purchase::class;

    public function definition(): array
    {
        return [
            'customer_id' => new CustomerFactory(),
            'variant_id' => new VariantFactory(),
            'uuid' => $this->faker->unique()->uuid(),
            'state' => $this->faker->randomElement(['reserved', 'preparing', 'shipped', 'delivered']),
            'priority' => $this->faker->numberBetween(1, 3),
        ];
    }
}
