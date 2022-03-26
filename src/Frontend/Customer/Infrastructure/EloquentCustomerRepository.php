<?php

declare(strict_types=1);

namespace Src\Frontend\Customer\Infrastructure;

use Src\Frontend\Customer\Domain\Customer;
use Src\Frontend\Customer\Domain\CustomerRepository;

final class EloquentCustomerRepository implements CustomerRepository
{
    public function save(Customer $customer): bool
    {
        return false;
    }
}
