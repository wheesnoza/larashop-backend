<?php declare(strict_types=1);

namespace Tests\Frontend\Purchase\Domain;

use Src\Frontend\Customer\Domain\CustomerUuid;
use Src\Frontend\Purchase\Domain\Purchase;
use Src\Frontend\Purchase\Domain\PurchasePriority;
use Src\Frontend\Purchase\Domain\PurchaseQuantity;
use Src\Frontend\Purchase\Domain\PurchaseState;
use Src\Frontend\Purchase\Domain\PurchaseUuid;
use Src\Frontend\Variant\Domain\VariantUuid;
use Tests\Frontend\Customer\Domain\CustomerUuidMother;
use Tests\Frontend\Variant\Domain\VariantUuidMother;

final class PurchaseMother
{
    public static function create(
        ?PurchaseUuid $uuid = null,
        ?CustomerUuid $customerUuid = null,
        ?VariantUuid $variantUuid = null,
        ?PurchaseState $state = null,
        ?PurchasePriority $priority = null,
        ?PurchaseQuantity $quantity = null
    ): Purchase {
        return new Purchase(
            $uuid ?? PurchaseUuidMother::create(),
            $customerUuid ?? CustomerUuidMother::create(),
            $variantUuid ?? VariantUuidMother::create(),
            $state ?? PurchaseStateMother::create(),
            $priority ?? PurchasePriorityMother::create(),
            $quantity ?? PurchaseQuantityMother::create(),
        );
    }
}
