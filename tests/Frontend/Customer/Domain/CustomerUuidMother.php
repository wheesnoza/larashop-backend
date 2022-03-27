<?php

declare(strict_types=1);

namespace Tests\Frontend\Customer\Domain;

use Src\Frontend\Customer\Domain\CustomerUuid;
use Tests\Shared\Domain\MotherCreator;

final class CustomerUuidMother
{
    public static function create(?string $value = null): CustomerUuid
    {
        return new CustomerUuid($value ?? MotherCreator::random()->unique()->uuid());
    }
}
