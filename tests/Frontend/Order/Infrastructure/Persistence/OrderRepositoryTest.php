<?php declare(strict_types=1);

namespace Tests\Frontend\Order\Infrastructure\Persistence;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Frontend\Order\Domain\OrderMother;
use Tests\Frontend\Order\Domain\OrderIdMother;
use Tests\Frontend\Order\OrderModuleInfrastructureTestCase;

final class OrderRepositoryTest extends OrderModuleInfrastructureTestCase
{
    use RefreshDatabase;

    public function test_should_save_a_order(): void
    {
        $order = OrderMother::create();

        $this->shouldSave($order);

        $this->assertDatabaseHas('orders', ['id' => $order->id()]);
    }

    public function test_should_return_an_existing_order(): void
    {
        $order = OrderMother::create();

        $this->shouldSave($order);

        $this->assertEquals($order, $this->repository()->find($order->id()));
    }

    public function test_should_return_null_when_order_no_exists(): void
    {
        $this->assertNull($this->repository()->find(OrderIdMother::create()));
    }
}
