<?php

declare(strict_types=1);

namespace Tests\Frontend\Customer\Domain;

use Src\Frontend\Customer\Domain\CustomerFirstName;
use Tests\Shared\Domain\MotherCreator;

final class CustomerFirstNameMother
{
    public static function create(?string $value = null): CustomerFirstName
    {
        return new CustomerFirstName($value ?? MotherCreator::random()->firstName());
    }
}
