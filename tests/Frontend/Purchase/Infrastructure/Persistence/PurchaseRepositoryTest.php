<?php declare(strict_types=1);

namespace Tests\Frontend\Purchase\Infrastructure\Persistence;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Frontend\Purchase\Domain\PurchaseMother;
use Tests\Frontend\Purchase\Domain\PurchaseUuidMother;
use Tests\Frontend\Purchase\PurchaseModuleInfrastructureTestCase;

final class PurchaseRepositoryTest extends PurchaseModuleInfrastructureTestCase
{
    use RefreshDatabase;

    public function test_should_save_a_product(): void
    {
        $purchase = PurchaseMother::create();

        $this->shouldSave($purchase);

        $this->assertDatabaseHas('purchases', ['uuid' => $purchase->uuid()]);
    }

    public function test_should_return_an_existing_product(): void
    {
        $purchase = PurchaseMother::create();

        $this->shouldSave($purchase);

        $this->assertEquals($purchase, $this->repository()->find($purchase->uuid()));
    }

    public function test_should_return_null_when_purchase_no_exists(): void
    {
        $this->assertNull($this->repository()->find(PurchaseUuidMother::create()));
    }
}
