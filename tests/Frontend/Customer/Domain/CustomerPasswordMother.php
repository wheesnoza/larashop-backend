<?php

declare(strict_types=1);

namespace Tests\Frontend\Customer\Domain;

use Src\Frontend\Customer\Domain\CustomerPassword;
use Tests\Shared\Domain\MotherCreator;

final class CustomerPasswordMother
{
    public static function create(?string $value = null): CustomerPassword
    {
        return new CustomerPassword($value ?? MotherCreator::random()->password());
    }
}
