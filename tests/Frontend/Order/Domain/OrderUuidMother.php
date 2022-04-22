<?php declare(strict_types=1);

namespace Tests\Frontend\Order\Domain;

use Src\Frontend\Order\Domain\OrderUuid;
use Tests\Shared\Domain\MotherCreator;

final class OrderUuidMother
{
    public static function create(?string $value = null): OrderUuid
    {
        return new OrderUuid($value ?? MotherCreator::random()->unique()->uuid());
    }
}
