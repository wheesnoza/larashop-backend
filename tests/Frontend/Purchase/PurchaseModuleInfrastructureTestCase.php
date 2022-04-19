<?php

declare(strict_types=1);

namespace Tests\Frontend\Purchase;

use Database\Factories\CustomerFactory;
use Database\Factories\VariantFactory;
use Src\Frontend\Purchase\Domain\Purchase;
use Src\Frontend\Purchase\Domain\PurchaseRepository;
use Tests\TestCase;

abstract class PurchaseModuleInfrastructureTestCase extends TestCase
{
    private PurchaseRepository $repository;

    protected function repository(): PurchaseRepository
    {
        return $this->repository =  $this->repository ?? app(PurchaseRepository::class);
    }

    protected function shouldSave(Purchase $purchase)
    {
        (new VariantFactory())->create(['uuid' => $purchase->variantUuid()]);
        (new CustomerFactory())->create(['uuid' => $purchase->customerUuid()]);

        $this->repository()->save($purchase);
    }
}
