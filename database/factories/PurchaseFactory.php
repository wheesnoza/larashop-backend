<?php declare(strict_types=1);

namespace Database\Factories;

use App\Shared\Models\Purchase;
use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Frontend\Purchase\Domain\PurchasePriority;
use Src\Frontend\Purchase\Domain\PurchaseState;

final class PurchaseFactory extends Factory
{
    protected $model = Purchase::class;

    public function definition(): array
    {
        return [
            'customer_id' => new CustomerFactory(),
            'variant_id' => new VariantFactory(),
            'uuid' => $this->faker->unique()->uuid(),
            'state' => $this->faker->randomElement(PurchaseState::cases())->value,
            'priority' => $this->faker->randomElement(PurchasePriority::cases())->value,
        ];
    }
}
