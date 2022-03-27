<?php

declare(strict_types=1);

namespace Tests\Frontend\Product\Infrastructure\Persistence;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Frontend\Product\Domain\ProductMother;
use Tests\Frontend\Product\Domain\ProductUuidMother;
use Tests\Frontend\Product\ProductModuleInfrastructureTestCase;

final class ProductRepositoryTest extends ProductModuleInfrastructureTestCase
{
    use RefreshDatabase;

    public function test_should_save_a_product(): void
    {
        $product = ProductMother::create();

        $this->repository()->save($product);

        $this->assertDatabaseHas('products', $product->toPrimitives());
    }

    public function test_should_return_an_existing_product(): void
    {
        $product = ProductMother::create();

        $this->repository()->save($product);

        $this->assertEquals($product, $this->repository()->find($product->uuid()));
    }


    public function test_should_not_return_a_non_existing_product(): void
    {
        $this->assertNull($this->repository()->find(ProductUuidMother::create()));
    }
}
