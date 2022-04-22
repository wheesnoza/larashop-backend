<?php declare(strict_types=1);

namespace Tests\Frontend\Order\Domain;

use Src\Frontend\Order\Domain\OrderState;
use Tests\Shared\Domain\MotherCreator;

final class OrderStateMother
{
    public static function create(?int $value = 0): OrderState
    {
        return OrderState::tryFrom($value) ?? MotherCreator::random()
                ->randomElement(OrderState::cases());
    }
}
