<?php

declare(strict_types=1);

namespace Tests\Frontend\Product\Domain;

use Src\Frontend\Product\Domain\ProductName;
use Tests\Shared\Domain\MotherCreator;

final class ProductNameMother
{
    public static function create(?string $value = null): ProductName
    {
        return new ProductName($value ?? MotherCreator::random()->sentence());
    }
}
