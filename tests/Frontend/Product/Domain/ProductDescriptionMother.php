<?php

declare(strict_types=1);

namespace Tests\Frontend\Product\Domain;

use Src\Frontend\Product\Domain\ProductDescription;
use Tests\Shared\Domain\MotherCreator;

final class ProductDescriptionMother
{
    public static function create(?string $value = null): ProductDescription
    {
        return new ProductDescription($value ?? MotherCreator::random()->text());
    }
}
