<?php

namespace Src\Frontend\Purchase\Application\Listener;

use Src\Frontend\Purchase\Domain\PurchaseCreatedDomainEvent;

interface SendOrderReceivedNotification
{
    public function handle(PurchaseCreatedDomainEvent $event): void;
}
