<?php

namespace Src\Frontend\Stock\Domain;

use Src\Frontend\Purchase\Domain\PurchaseQuantity;
use Src\Frontend\Variant\Domain\Variant;

interface StockRepository
{
    public function ensure(Variant $variant, PurchaseQuantity $quantity): self;
    public function count(): int;
    public function reduce(): void;
}
