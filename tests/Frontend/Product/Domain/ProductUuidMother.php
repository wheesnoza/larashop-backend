<?php

declare(strict_types=1);

namespace Tests\Frontend\Product\Domain;

use Src\Frontend\Customer\Domain\CustomerUuid;
use Src\Frontend\Product\Domain\ProductUuid;
use Tests\Shared\Domain\MotherCreator;

final class ProductUuidMother
{
    public static function create(?string $value = null): ProductUuid
    {
        return new ProductUuid($value ?? MotherCreator::random()->unique()->uuid());
    }
}
