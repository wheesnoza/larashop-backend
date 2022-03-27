<?php declare(strict_types=1);

namespace Src\Frontend\Customer\Domain;

interface SendWelcomeNotification
{
    public function handle(CustomerCreatedDomainEvent $event): void;
}
