<?php

declare(strict_types=1);

namespace Src\Frontend\Customer\Application\Create;

use Src\Frontend\Customer\Domain\Customer;
use Src\Frontend\Customer\Domain\CustomerEmail;
use Src\Frontend\Customer\Domain\CustomerFirstName;
use Src\Frontend\Customer\Domain\CustomerLastName;
use Src\Frontend\Customer\Domain\CustomerPassword;
use Src\Frontend\Customer\Domain\CustomerRepository;
use Src\Frontend\Customer\Domain\CustomerUuid;
use Src\Shared\Domain\Bus\Event\EventBus;

final class CustomerCreator
{
    private CustomerRepository $customerRepository;
    private EventBus $bus;

    public function __construct(CustomerRepository $customerRepository, EventBus $bus)
    {
        $this->customerRepository = $customerRepository;
        $this->bus = $bus;
    }

    public function __invoke(array $attributes): Customer
    {
        $customer = Customer::create(
            CustomerUuid::generate(),
            new CustomerEmail($attributes['email']),
            new CustomerPassword($attributes['password']),
            new CustomerFirstName($attributes['first_name']),
            new CustomerLastName($attributes['last_name']),
        );

        $this->customerRepository
            ->save($customer);

        $this->bus->publish(...$customer->pullDomainEvents());

        return $customer;
    }
}
