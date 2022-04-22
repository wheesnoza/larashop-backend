<?php declare(strict_types=1);

namespace Tests\Frontend\Order\Domain;

use Src\Frontend\Order\Domain\OrderPriority;
use Tests\Shared\Domain\MotherCreator;

final class OrderPriorityMother
{
    public static function create(?int $value = 0): OrderPriority
    {
        return OrderPriority::tryFrom($value) ?? MotherCreator::random()
            ->randomElement(OrderPriority::cases());
    }
}
