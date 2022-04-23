<?php

declare(strict_types=1);

namespace Tests\Frontend\Product\Domain;

use Src\Frontend\Product\Domain\Product;
use Src\Frontend\Product\Domain\ProductDescription;
use Src\Frontend\Product\Domain\ProductName;
use Src\Frontend\Product\Domain\ProductId;

final class ProductMother
{
    public static function create(
        ?ProductId          $id = null,
        ?ProductName        $name = null,
        ?ProductDescription $description = null,
    ): Product {
        return new Product(
            $id ?? ProductIdMother::create(),
            $name ?? ProductNameMother::create(),
            $description ?? ProductDescriptionMother::create()
        );
    }
}
