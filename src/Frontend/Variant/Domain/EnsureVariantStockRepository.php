<?php declare(strict_types=1);

namespace Src\Frontend\Variant\Domain;

use Src\Frontend\Purchase\Domain\OrderQuantity;

interface EnsureVariantStockRepository
{
    public function ensure(VariantUuid $variantUuid, OrderQuantity $quantity): self;

    public function reduce(): void;
}
