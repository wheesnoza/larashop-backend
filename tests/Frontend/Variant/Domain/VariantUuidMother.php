<?php declare(strict_types=1);

namespace Tests\Frontend\Variant\Domain;

use Src\Frontend\Variant\Domain\VariantUuid;
use Tests\Shared\Domain\MotherCreator;

final class VariantUuidMother
{
    public static function create(?string $value = null): VariantUuid
    {
        return new VariantUuid($value ?? MotherCreator::random()->unique()->uuid());
    }
}
