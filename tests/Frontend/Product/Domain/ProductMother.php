<?php

declare(strict_types=1);

namespace Tests\Frontend\Product\Domain;

use Src\Frontend\Product\Domain\Product;
use Src\Frontend\Product\Domain\ProductDescription;
use Src\Frontend\Product\Domain\ProductName;
use Src\Frontend\Product\Domain\ProductUuid;

final class ProductMother
{
    public static function create(
        ?ProductUuid $uuid = null,
        ?ProductName $name = null,
        ?ProductDescription $description = null,
    ): Product {
        return new Product(
            $uuid ?? ProductUuidMother::create(),
            $name ?? ProductNameMother::create(),
            $description ?? ProductDescriptionMother::create()
        );
    }
}
