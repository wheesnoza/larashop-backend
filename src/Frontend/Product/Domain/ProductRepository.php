<?php

namespace Src\Frontend\Product\Domain;

interface ProductRepository
{
    public function save(Product $product): void;

    public function find(ProductUuid $uuid): ?Product;
}
