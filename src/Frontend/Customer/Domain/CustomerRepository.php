<?php

declare(strict_types=1);

namespace Src\Frontend\Customer\Domain;

interface CustomerRepository
{
    public function save(Customer $customer): void;

    public function find(CustomerUuid $uuid): ?Customer;
}
