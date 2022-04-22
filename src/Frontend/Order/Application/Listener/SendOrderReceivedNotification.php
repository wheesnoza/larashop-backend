<?php declare(strict_types=1);

namespace Src\Frontend\Order\Application\Listener;

use Src\Frontend\Purchase\Domain\OrderCreatedDomainEvent;

interface SendOrderReceivedNotification
{
    public function handle(OrderCreatedDomainEvent $event): void;
}
