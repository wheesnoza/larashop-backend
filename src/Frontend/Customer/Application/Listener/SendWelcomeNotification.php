<?php declare(strict_types=1);

namespace Src\Frontend\Customer\Application\Listener;

use Src\Frontend\Customer\Domain\CustomerCreatedDomainEvent;

interface SendWelcomeNotification
{
    public function handle(CustomerCreatedDomainEvent $event): void;
}
