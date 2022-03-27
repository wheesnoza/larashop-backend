<?php

declare(strict_types=1);

namespace Src\Frontend\Customer\Infrastructure\Persistence;

use App\Models\Customer as EloquentModelCustomer;
use Src\Frontend\Customer\Domain\Customer;
use Src\Frontend\Customer\Domain\CustomerRepository;
use Src\Frontend\Customer\Domain\CustomerUuid;

final class EloquentCustomerRepository implements CustomerRepository
{
    public function save(Customer $customer): void
    {
        EloquentModelCustomer::updateOrCreate(
            [
                'uuid' => $customer->uuid()->value()
            ],
            $customer->toPrimitives()
        );
    }

    public function find(CustomerUuid $uuid): ?Customer
    {
        return EloquentModelCustomer::firstWhere('uuid', $uuid)?->toDomain();
    }
}
