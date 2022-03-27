<?php

declare(strict_types=1);

namespace Tests\Frontend\Customer\Domain;

use Src\Frontend\Customer\Domain\CustomerEmail;
use Tests\Shared\Domain\MotherCreator;

final class CustomerEmailMother
{
    public static function create(?string $value = null): CustomerEmail
    {
        return new CustomerEmail($value ?? MotherCreator::random()->unique()->email());
    }
}
