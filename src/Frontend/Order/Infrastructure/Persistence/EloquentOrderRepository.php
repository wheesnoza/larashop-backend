<?php declare(strict_types=1);

namespace Src\Frontend\Order\Infrastructure\Persistence;

use Src\Frontend\Order\Domain\Order;
use Src\Frontend\Order\Domain\OrderRepository;
use App\Shared\Models\Order as EloquentModelPurchase;
use App\Shared\Models\Customer as EloquentModelCustomer;
use App\Shared\Models\Variant as EloquentModelVariant;
use Src\Frontend\Order\Domain\OrderUuid;

final class EloquentOrderRepository implements OrderRepository
{
    public function save(Order $purchase): void
    {
        EloquentModelPurchase::updateOrCreate(
            [
                'uuid' => $purchase->uuid()
            ],
            [
                'customer_id' => EloquentModelCustomer::firstWhere(
                    'uuid',
                    $purchase->customerUuid()
                )->id,
                'variant_id' => EloquentModelVariant::firstWhere(
                    'uuid',
                    $purchase->variantUuid()
                )->id,
                'state' => $purchase->state(),
                'priority' => $purchase->priority(),
                'quantity' => $purchase->quantity()->value(),
            ]
        );
    }

    public function find(string|OrderUuid $uuid): ?Order
    {
        return EloquentModelPurchase::firstWhere(
            'uuid',
            $uuid
        )?->toDomain();
    }
}
