<?php declare(strict_types=1);

namespace Tests\Frontend\Order\Domain;

use Src\Frontend\Order\Domain\OrderQuantity;
use Tests\Shared\Domain\MotherCreator;

final class OrderQuantityMother
{
    public static function create(?string $value = null): OrderQuantity
    {
        return new OrderQuantity(
            $value ??
            MotherCreator::random()
                ->numberBetween(1, config('purchase.max_quantity'))
        );
    }
}
