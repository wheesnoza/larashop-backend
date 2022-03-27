<?php declare(strict_types=1);

namespace Src\Frontend\Customer\Domain;

use Src\Shared\Domain\Bus\Event\DomainEvent;

abstract class CustomerCreatedDomainEvent implements DomainEvent
{
    public Customer $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }
}
