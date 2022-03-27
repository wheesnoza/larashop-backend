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

final class CustomerCreator
{
    private CustomerRepository $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function __invoke(array $attributes): void
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
    }
}
