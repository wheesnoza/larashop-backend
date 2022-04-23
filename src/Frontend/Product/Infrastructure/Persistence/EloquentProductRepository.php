<?php

declare(strict_types=1);

namespace Src\Frontend\Product\Infrastructure\Persistence;

use App\Shared\Models\Product as EloquentModelProduct;
use Src\Frontend\Product\Domain\Product;
use Src\Frontend\Product\Domain\ProductRepository;
use Src\Frontend\Product\Domain\ProductId;

final class EloquentProductRepository implements ProductRepository
{
    public function save(Product $product): void
    {
        EloquentModelProduct::updateOrCreate(
            [
                'id' => $product->id()->value()
            ],
            $product->toPrimitives()
        );
    }

    public function find(ProductId $id): ?Product
    {
        return EloquentModelProduct::find($id)
            ?->toDomain();
    }
}
