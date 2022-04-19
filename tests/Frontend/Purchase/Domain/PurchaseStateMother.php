<?php declare(strict_types=1);

namespace Tests\Frontend\Purchase\Domain;

use Src\Frontend\Purchase\Domain\PurchaseState;
use Tests\Shared\Domain\MotherCreator;

final class PurchaseStateMother
{
    public static function create(?int $value = 0): PurchaseState
    {
        return PurchaseState::tryFrom($value) ?? MotherCreator::random()
                ->randomElement(PurchaseState::cases());
    }
}
