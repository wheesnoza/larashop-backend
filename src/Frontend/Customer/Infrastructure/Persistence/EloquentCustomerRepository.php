<?php

declare(strict_types=1);

namespace Src\Frontend\Customer\Infrastructure\Persistence;

use App\Shared\Models\Customer as EloquentModelCustomer;
use Src\Frontend\Customer\Domain\Customer;
use Src\Frontend\Customer\Domain\CustomerRepository;
use Src\Frontend\Customer\Domain\CustomerId;

final class EloquentCustomerRepository implements CustomerRepository
{
    public function save(Customer $customer): void
    {
        EloquentModelCustomer::updateOrCreate(
            [
                'id' => $customer->id()->value()
            ],
            $customer->toPrimitives()
        );
    }

    public function find(CustomerId $id): ?Customer
    {
        return EloquentModelCustomer::find($id)?->toDomain();
    }
}
