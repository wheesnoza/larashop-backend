<?php declare(strict_types=1);

namespace Tests\Frontend\Variant\Domain;

use Src\Frontend\Variant\Domain\VariantId;

final class VariantIdMother
{
    public static function create(?string $value = null): VariantId
    {
        return new VariantId($value ?? snowflake());
    }
}
