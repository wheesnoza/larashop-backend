<?php

declare(strict_types=1);

namespace Src\Frontend\Customer\Infrastructure;

use Src\Frontend\Customer\Domain\Customer;
use App\Models\Customer as EloquentModelCustomer;
use Src\Frontend\Customer\Domain\CustomerRepository;
use Src\Frontend\Customer\Domain\CustomerUuid;

final class EloquentCustomerRepository implements CustomerRepository
{
    public function save(Customer $customer): void
    {
        EloquentModelCustomer::create($customer->toPrimitives());
    }

    public function find(CustomerUuid $uuid): ?Customer
    {
        return EloquentModelCustomer::firstWhere('uuid', $uuid)?->toDomain();
    }
}
