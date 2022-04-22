<?php declare(strict_types=1);

namespace Src\Frontend\Order\Domain;

use Src\Frontend\Customer\Domain\CustomerUuid;
use Src\Frontend\Variant\Domain\VariantUuid;
use Src\Shared\Domain\Aggregate\DomainEventAggregateRoot;

final class Order extends DomainEventAggregateRoot
{
    private OrderUuid $uuid;
    private CustomerUuid $customerUuid;
    private VariantUuid $variantUuid;
    private OrderState $state;
    private OrderPriority $priority;
    private OrderQuantity $quantity;

    public function __construct(
        OrderUuid     $uuid,
        CustomerUuid  $customerUuid,
        VariantUuid   $variantUuid,
        OrderState    $state,
        OrderPriority $priority,
        OrderQuantity $quantity
    ) {
        $this->uuid = $uuid;
        $this->customerUuid = $customerUuid;
        $this->variantUuid = $variantUuid;
        $this->state = $state;
        $this->priority = $priority;
        $this->quantity = $quantity;
    }

    public static function create(
        OrderUuid     $uuid,
        CustomerUuid  $customerUuid,
        VariantUuid   $variantUuid,
        OrderState    $state,
        OrderPriority $priority,
        OrderQuantity $quantity
    ): self {
        $purchase = new self(
            $uuid,
            $customerUuid,
            $variantUuid,
            $state,
            $priority,
            $quantity
        );

        $purchase->record(new OrderCreatedDomainEvent($purchase));

        return $purchase;
    }

    public function uuid(): OrderUuid
    {
        return $this->uuid;
    }

    public function customerUuid(): CustomerUuid
    {
        return $this->customerUuid;
    }

    public function variantUuid(): VariantUuid
    {
        return $this->variantUuid;
    }

    public function state(): OrderState
    {
        return $this->state;
    }

    public function priority(): OrderPriority
    {
        return $this->priority;
    }

    public function quantity(): OrderQuantity
    {
        return $this->quantity;
    }

    public function toPrimitives(): array
    {
        return [
            'uuid' => $this->uuid->value(),
            'customer_uuid' => $this->customerUuid->value(),
            'variant_uuid' => $this->variantUuid->value(),
            'state' => $this->state->value,
            'priority' => $this->priority->value,
            'quantity' => $this->quantity->value(),
        ];
    }
}
