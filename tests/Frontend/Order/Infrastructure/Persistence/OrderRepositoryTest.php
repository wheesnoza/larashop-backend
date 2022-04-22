<?php declare(strict_types=1);

namespace Tests\Frontend\Order\Infrastructure\Persistence;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Frontend\Order\Domain\OrderMother;
use Tests\Frontend\Order\Domain\OrderUuidMother;
use Tests\Frontend\Order\OrderModuleInfrastructureTestCase;

final class OrderRepositoryTest extends OrderModuleInfrastructureTestCase
{
    use RefreshDatabase;

    public function test_should_save_a_product(): void
    {
        $purchase = OrderMother::create();

        $this->shouldSave($purchase);

        $this->assertDatabaseHas('orders', ['uuid' => $purchase->uuid()]);
    }

    public function test_should_return_an_existing_product(): void
    {
        $purchase = OrderMother::create();

        $this->shouldSave($purchase);

        $this->assertEquals($purchase, $this->repository()->find($purchase->uuid()));
    }

    public function test_should_return_null_when_purchase_no_exists(): void
    {
        $this->assertNull($this->repository()->find(OrderUuidMother::create()));
    }
}
