<?php declare(strict_types=1);

namespace Tests\Frontend\Order\Domain;

use Src\Frontend\Order\Domain\OrderId;

final class OrderIdMother
{
    public static function create(?string $value = null): OrderId
    {
        return new OrderId($value ?? snowflake());
    }
}
