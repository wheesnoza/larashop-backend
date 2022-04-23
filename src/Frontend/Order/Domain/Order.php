<?php declare(strict_types=1);

namespace Src\Frontend\Order\Domain;

use Src\Frontend\Customer\Domain\CustomerId;
use Src\Frontend\Variant\Domain\VariantId;
use Src\Shared\Domain\Aggregate\DomainEventAggregateRoot;

final class Order extends DomainEventAggregateRoot
{
    private OrderId $id;
    private CustomerId $customerId;
    private VariantId $variantId;
    private OrderState $state;
    private OrderPriority $priority;
    private OrderQuantity $quantity;

    public function __construct(
        OrderId       $id,
        CustomerId    $customerId,
        VariantId   $variantId,
        OrderState    $state,
        OrderPriority $priority,
        OrderQuantity $quantity
    ) {
        $this->id = $id;
        $this->customerId = $customerId;
        $this->variantId = $variantId;
        $this->state = $state;
        $this->priority = $priority;
        $this->quantity = $quantity;
    }

    public static function create(
        OrderId       $id,
        CustomerId    $customerId,
        VariantId     $variantId,
        OrderState    $state,
        OrderPriority $priority,
        OrderQuantity $quantity
    ): self {
        $order = new self(
            $id,
            $customerId,
            $variantId,
            $state,
            $priority,
            $quantity
        );

        $order->record(new OrderCreatedDomainEvent($order));

        return $order;
    }

    public function id(): OrderId
    {
        return $this->id;
    }

    public function customerId(): CustomerId
    {
        return $this->customerId;
    }

    public function variantId(): VariantId
    {
        return $this->variantId;
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
            'id' => $this->id->value(),
            'customer_id' => $this->customerId->value(),
            'variant_id' => $this->variantId->value(),
            'state' => $this->state->value,
            'priority' => $this->priority->value,
            'quantity' => $this->quantity->value(),
        ];
    }
}
