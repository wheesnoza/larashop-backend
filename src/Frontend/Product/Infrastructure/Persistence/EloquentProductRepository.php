<?php

declare(strict_types=1);

namespace Src\Frontend\Product\Infrastructure\Persistence;

use App\Shared\Models\Product as EloquentModelProduct;
use Src\Frontend\Product\Domain\Product;
use Src\Frontend\Product\Domain\ProductRepository;
use Src\Frontend\Product\Domain\ProductUuid;

final class EloquentProductRepository implements ProductRepository
{
    public function save(Product $product): void
    {
        EloquentModelProduct::updateOrCreate(
            [
                'uuid' => $product->uuid()->value()
            ],
            $product->toPrimitives()
        );
    }

    public function find(ProductUuid $uuid): ?Product
    {
        return EloquentModelProduct::firstWhere('uuid', $uuid)?->toDomain();
    }
}
