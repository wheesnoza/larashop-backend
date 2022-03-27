<?php declare(strict_types=1);

namespace Src\Frontend\Customer\Domain;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Src\Shared\Domain\Bus\Event\DomainEvent;

final class CustomerCreatedDomainEvent implements DomainEvent
{
    use Dispatchable;
    use InteractsWithSockets;

    public Customer $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }
}
