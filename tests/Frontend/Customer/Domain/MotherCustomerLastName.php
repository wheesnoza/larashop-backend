<?php

declare(strict_types=1);

namespace Tests\Frontend\Customer\Domain;

use Src\Frontend\Customer\Domain\CustomerLastName;
use Tests\Shared\Domain\MotherCreator;

final class MotherCustomerLastName
{
    public static function create(?string $value = null): CustomerLastName
    {
        return new CustomerLastName($value ?? MotherCreator::random()->lastName());
    }
}
