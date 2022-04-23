<?php

declare(strict_types=1);

namespace Tests\Frontend\Product\Domain;

use Src\Frontend\Product\Domain\ProductId;

final class ProductIdMother
{
    public static function create(?string $value = null): ProductId
    {
        return new ProductId($value ?? snowflake());
    }
}
