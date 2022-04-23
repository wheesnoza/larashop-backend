<?php declare(strict_types=1);

namespace Database\Factories;

use App\Shared\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Frontend\Order\Domain\OrderPriority;
use Src\Frontend\Order\Domain\OrderState;

final class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'id' => snowflake(),
            'customer_id' => new CustomerFactory(),
            'variant_id' => new VariantFactory(),
            'state' => $this->faker->randomElement(OrderState::cases())->value,
            'priority' => $this->faker->randomElement(OrderPriority::cases())->value,
            'quantity' => $this->faker->numberBetween(1, 5),
        ];
    }
}
