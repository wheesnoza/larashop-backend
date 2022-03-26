<?php

declare(strict_types=1);

namespace Src\Frontend\Customer\Application\Create;

use Src\Frontend\Customer\Domain\CustomerRepository;

final class CustomerCreator
{
    private CustomerRepository $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function __invoke(): void
    {
    }
}
