<?php

declare(strict_types=1);

namespace Tests\Frontend\Order;

use Database\Factories\CustomerFactory;
use Database\Factories\VariantFactory;
use Src\Frontend\Order\Domain\Order;
use Src\Frontend\Order\Domain\OrderRepository;
use Tests\TestCase;

abstract class OrderModuleInfrastructureTestCase extends TestCase
{
    private OrderRepository $repository;

    protected function repository(): OrderRepository
    {
        return $this->repository =  $this->repository ?? app(OrderRepository::class);
    }

    protected function shouldSave(Order $order)
    {
        (new VariantFactory())->create(['id' => $order->variantId()->value()]);
        (new CustomerFactory())->create(['id' => $order->customerId()->value()]);

        $this->repository()->save($order);
    }
}
