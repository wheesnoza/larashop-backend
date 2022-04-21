<?php

namespace Src\Frontend\Purchase\Domain;

use Src\Frontend\Variant\Domain\Variant;

interface BuyRepository
{
    public function buy(Variant $variant, PurchaseQuantity $quantity, callable $callable): void;
}
