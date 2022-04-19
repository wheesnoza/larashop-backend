<?php declare(strict_types=1);

namespace Src\Frontend\Purchase\Domain;

interface PurchaseRepository
{
    public function save(Purchase $purchase): void;

    public function find(string|PurchaseUuid $uuid): ?Purchase;
}
