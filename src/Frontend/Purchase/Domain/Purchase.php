<?php

namespace Src\Frontend\Purchase\Domain;

use Src\Frontend\Customer\Domain\CustomerUuid;
use Src\Frontend\Variant\Domain\VariantUuid;

class Purchase
{
    private CustomerUuid $customerUuid;
    private VariantUuid $variantUuid;
    private PurchaseState $state;
    private PurchasePriority $priority;

    public function __construct(
        CustomerUuid $customerUuid,
        VariantUuid $variantUuid,
        PurchaseState $state,
        PurchasePriority $priority
    ) {
        $this->customerUuid = $customerUuid;
        $this->variantUuid = $variantUuid;
        $this->state = $state;
        $this->priority = $priority;
    }

    public static function create(
        CustomerUuid $customerUuid,
        VariantUuid $variantUuid,
        PurchaseState $state,
        PurchasePriority $priority
    ): self {
        return new self($customerUuid, $variantUuid, $state, $priority);
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
}
