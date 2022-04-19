<?php declare(strict_types=1);

namespace Src\Frontend\Purchase\Domain;

use Src\Frontend\Customer\Domain\CustomerUuid;
use Src\Frontend\Variant\Domain\VariantUuid;
use Src\Shared\Domain\Aggregate\DomainEventAggregateRoot;

final class Purchase extends DomainEventAggregateRoot
{
    private PurchaseUuid $uuid;
    private CustomerUuid $customerUuid;
    private VariantUuid $variantUuid;
    private PurchaseState $state;
    private PurchasePriority $priority;
    private PurchaseQuantity $quantity;

    public function __construct(
        PurchaseUuid $uuid,
        CustomerUuid $customerUuid,
        VariantUuid $variantUuid,
        PurchaseState $state,
        PurchasePriority $priority,
        PurchaseQuantity $quantity
    ) {
        $this->uuid = $uuid;
        $this->customerUuid = $customerUuid;
        $this->variantUuid = $variantUuid;
        $this->state = $state;
        $this->priority = $priority;
        $this->quantity = $quantity;
    }

    public static function create(
        PurchaseUuid $uuid,
        CustomerUuid $customerUuid,
        VariantUuid $variantUuid,
        PurchaseState $state,
        PurchasePriority $priority,
        PurchaseQuantity $quantity
    ): self {
        return new self(
            $uuid,
            $customerUuid,
            $variantUuid,
            $state,
            $priority,
            $quantity
        );
    }

    public function uuid(): PurchaseUuid
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

    public function state(): PurchaseState
    {
        return $this->state;
    }

    public function priority(): PurchasePriority
    {
        return $this->priority;
    }

    public function quantity(): PurchaseQuantity
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
