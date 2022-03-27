<?php

declare(strict_types=1);

namespace Tests\Frontend\Customer;

use Src\Frontend\Customer\Domain\CustomerRepository;
use Tests\TestCase;

abstract class CustomerModuleInfrastructureTestCase extends TestCase
{
    protected function repository(): CustomerRepository
    {
        return app(CustomerRepository::class);
    }
}
