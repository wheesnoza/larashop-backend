<?php

declare(strict_types=1);

namespace Tests\Frontend\Customer\Domain;

use Src\Frontend\Customer\Domain\CustomerId;

final class CustomerIdMother
{
    public static function create(?string $value = null): CustomerId
    {
        return new CustomerId($value ?? snowflake());
    }
}
