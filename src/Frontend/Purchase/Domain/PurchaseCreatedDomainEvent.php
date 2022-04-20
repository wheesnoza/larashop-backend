<?php declare(strict_types=1);

namespace Src\Frontend\Purchase\Domain;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Src\Shared\Domain\Bus\Event\DomainEvent;

final class PurchaseCreatedDomainEvent implements DomainEvent
{
    use Dispatchable;
    use InteractsWithSockets;

    public Purchase $purchase;

    public function __construct(Purchase $purchase)
    {
        $this->purchase = $purchase;
    }
}
