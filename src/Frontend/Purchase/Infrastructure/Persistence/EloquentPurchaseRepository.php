<?php declare(strict_types=1);

namespace Src\Frontend\Purchase\Infrastructure\Persistence;

use Src\Frontend\Purchase\Domain\Purchase;
use Src\Frontend\Purchase\Domain\PurchaseRepository;
use App\Shared\Models\Purchase as EloquentModelPurchase;
use App\Shared\Models\Customer as EloquentModelCustomer;
use App\Shared\Models\Variant as EloquentModelVariant;
use Src\Frontend\Purchase\Domain\PurchaseUuid;

final class EloquentPurchaseRepository implements PurchaseRepository
{
    public function save(Purchase $purchase): void
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

    public function find(string|PurchaseUuid $uuid): ?Purchase
    {
        return EloquentModelPurchase::firstWhere(
            'uuid',
            $uuid
        )?->toDomain();
    }
}
