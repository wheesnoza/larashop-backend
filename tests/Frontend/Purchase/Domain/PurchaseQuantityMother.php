<?php declare(strict_types=1);

namespace Tests\Frontend\Purchase\Domain;

use Src\Frontend\Purchase\Domain\PurchaseQuantity;
use Tests\Shared\Domain\MotherCreator;

final class PurchaseQuantityMother
{
    public static function create(?string $value = null): PurchaseQuantity
    {
        return new PurchaseQuantity(
            $value ??
            MotherCreator::random()
                ->numberBetween(1, config('purchase.max_quantity'))
        );
    }
}
