<?php declare(strict_types=1);

namespace Src\Frontend\Variant\Domain;

use Src\Frontend\Purchase\Domain\PurchaseQuantity;

interface EnsureVariantStockRepository
{
    public function ensure(VariantUuid $variantUuid, PurchaseQuantity $quantity): self;

    public function reduce(): void;
}
