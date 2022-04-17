<?php declare(strict_types=1);

namespace Src\Frontend\Product\Domain;

interface ProductRepository
{
    public function save(Product $product): void;

    public function find(string|ProductUuid $uuid): ?Product;
}
