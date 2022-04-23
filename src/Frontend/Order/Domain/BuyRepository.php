<?php declare(strict_types=1);

namespace Src\Frontend\Order\Domain;

interface BuyRepository
{
    public function buy(Order $order);
}
