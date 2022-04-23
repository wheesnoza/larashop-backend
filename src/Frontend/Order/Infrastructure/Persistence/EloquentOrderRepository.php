<?php declare(strict_types=1);

namespace Src\Frontend\Order\Infrastructure\Persistence;

use Src\Frontend\Order\Domain\Order;
use Src\Frontend\Order\Domain\OrderRepository;
use App\Shared\Models\Order as EloquentModelPurchase;
use Src\Frontend\Order\Domain\OrderId;

final class EloquentOrderRepository implements OrderRepository
{
    public function save(Order $order): void
    {
        EloquentModelPurchase::updateOrCreate(
            [
                'id' => $order->id()
            ],
            [
                'customer_id' => $order->customerId(),
                'variant_id' => $order->variantId(),
                'state' => $order->state(),
                'priority' => $order->priority(),
                'quantity' => $order->quantity()->value(),
            ]
        );
    }

    public function find(OrderId $id): ?Order
    {
        return EloquentModelPurchase::find($id)
            ?->toDomain();
    }
}
