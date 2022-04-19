<?php declare(strict_types=1);

namespace Tests\Frontend\Purchase\Domain;

use Src\Frontend\Purchase\Domain\PurchasePriority;
use Tests\Shared\Domain\MotherCreator;

final class PurchasePriorityMother
{
    public static function create(?string $value = null): PurchasePriority
    {
        return PurchasePriority::tryFrom($value) ?? MotherCreator::random()
            ->randomElement(PurchasePriority::cases());
    }
}
