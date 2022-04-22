<?php declare(strict_types=1);

namespace Src\Frontend\Order\Domain;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Src\Shared\Domain\Bus\Event\DomainEvent;

final class OrderCreatedDomainEvent implements DomainEvent
{
    use Dispatchable;
    use InteractsWithSockets;

    public Order $purchase;

    public function __construct(Order $purchase)
    {
        $this->purchase = $purchase;
    }
}
