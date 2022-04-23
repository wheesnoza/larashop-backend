<?php declare(strict_types=1);

namespace Tests\Frontend\Order\Domain;

use Src\Frontend\Customer\Domain\CustomerId;
use Src\Frontend\Order\Domain\Order;
use Src\Frontend\Order\Domain\OrderPriority;
use Src\Frontend\Order\Domain\OrderQuantity;
use Src\Frontend\Order\Domain\OrderState;
use Src\Frontend\Order\Domain\OrderId;
use Src\Frontend\Variant\Domain\VariantId;
use Tests\Frontend\Customer\Domain\CustomerIdMother;
use Tests\Frontend\Variant\Domain\VariantIdMother;

final class OrderMother
{
    public static function create(
        ?OrderId       $uuid = null,
        ?CustomerId    $customerId = null,
        ?VariantId     $variantId = null,
        ?OrderState    $state = null,
        ?OrderPriority $priority = null,
        ?OrderQuantity $quantity = null
    ): Order {
        return new Order(
            $uuid ?? OrderIdMother::create(),
            $customerId ?? CustomerIdMother::create(),
            $variantId ?? VariantIdMother::create(),
            $state ?? OrderStateMother::create(),
            $priority ?? OrderPriorityMother::create(),
            $quantity ?? OrderQuantityMother::create(),
        );
    }
}
