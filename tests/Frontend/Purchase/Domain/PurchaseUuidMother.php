<?php declare(strict_types=1);

namespace Tests\Frontend\Purchase\Domain;

use Src\Frontend\Purchase\Domain\PurchaseUuid;
use Tests\Shared\Domain\MotherCreator;

final class PurchaseUuidMother
{
    public static function create(?string $value = null): PurchaseUuid
    {
        return new PurchaseUuid($value ?? MotherCreator::random()->unique()->uuid());
    }
}
