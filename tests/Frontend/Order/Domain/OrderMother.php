<?php declare(strict_types=1);

namespace Tests\Frontend\Order\Domain;

use Src\Frontend\Customer\Domain\CustomerUuid;
use Src\Frontend\Order\Domain\Order;
use Src\Frontend\Order\Domain\OrderPriority;
use Src\Frontend\Order\Domain\OrderQuantity;
use Src\Frontend\Order\Domain\OrderState;
use Src\Frontend\Order\Domain\OrderUuid;
use Src\Frontend\Variant\Domain\VariantUuid;
use Tests\Frontend\Customer\Domain\CustomerUuidMother;
use Tests\Frontend\Variant\Domain\VariantUuidMother;

final class OrderMother
{
    public static function create(
        ?OrderUuid     $uuid = null,
        ?CustomerUuid  $customerUuid = null,
        ?VariantUuid   $variantUuid = null,
        ?OrderState    $state = null,
        ?OrderPriority $priority = null,
        ?OrderQuantity $quantity = null
    ): Order {
        return new Order(
            $uuid ?? OrderUuidMother::create(),
            $customerUuid ?? CustomerUuidMother::create(),
            $variantUuid ?? VariantUuidMother::create(),
            $state ?? OrderStateMother::create(),
            $priority ?? OrderPriorityMother::create(),
            $quantity ?? OrderQuantityMother::create(),
        );
    }
}
