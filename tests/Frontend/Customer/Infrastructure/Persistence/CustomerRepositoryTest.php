<?php

declare(strict_types=1);

namespace Tests\Frontend\Customer\Infrastructure\Persistence;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Frontend\Customer\CustomerModuleInfrastructureTestCase;
use Tests\Frontend\Customer\Domain\CustomerMother;
use Tests\Frontend\Customer\Domain\CustomerUuidMother;

final class CustomerRepositoryTest extends CustomerModuleInfrastructureTestCase
{
    use RefreshDatabase;

    public function test_should_save_a_customer(): void
    {
        $customer = CustomerMother::create();

        $this->repository()->save($customer);

        $this->assertDatabaseHas('customers', $customer->toPrimitives());
    }

    public function test_should_return_an_existing_customer(): void
    {
        $customer = CustomerMother::create();

        $this->repository()->save($customer);

        $this->assertSame($customer, $this->repository()->find($customer->uuid()));
    }


    public function test_should_not_return_a_non_existing_customer(): void
    {
        $this->assertNull($this->repository()->find(CustomerUuidMother::create()));
    }
}
