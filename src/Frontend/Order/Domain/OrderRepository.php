<?php declare(strict_types=1);

namespace Src\Frontend\Order\Domain;

interface OrderRepository
{
    public function save(Order $purchase): void;

    public function find(OrderId $id): ?Order;
}
