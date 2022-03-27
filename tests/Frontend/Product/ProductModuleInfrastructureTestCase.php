<?php

declare(strict_types=1);

namespace Tests\Frontend\Product;

use Src\Frontend\Product\Domain\ProductRepository;
use Tests\TestCase;

abstract class ProductModuleInfrastructureTestCase extends TestCase
{
    protected function repository(): ProductRepository
    {
        return app(ProductRepository::class);
    }
}
