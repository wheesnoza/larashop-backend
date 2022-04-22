<?php

namespace Src\Frontend\Stock\Infrastructure\Persistence;

use Illuminate\Support\Facades\Redis;
use Src\Frontend\Purchase\Domain\OrderQuantity;
use Src\Frontend\Stock\Domain\StockRepository;
use Src\Frontend\Variant\Domain\Variant;

class RedisStockRepository implements StockRepository
{
    private string $key;
    private OrderQuantity $quantity;

    public function ensure(Variant $variant, OrderQuantity $quantity): StockRepository
    {
        $this->key = "variant:{$variant->uuid()->value()}:stocks";
        $this->quantity = $quantity;

        return $this;
    }

    public function count(): int
    {
        return (int) Redis::get($this->key);
    }

    public function reduce(): void
    {
        Redis::decrby($this->key, $this->quantity->value());
    }
}
