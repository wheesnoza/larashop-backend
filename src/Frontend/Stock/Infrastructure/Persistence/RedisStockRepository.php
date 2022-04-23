<?php declare(strict_types=1);

namespace Src\Frontend\Stock\Infrastructure\Persistence;

use Illuminate\Support\Facades\Redis;
use Src\Frontend\Stock\Domain\StockRepository;
use Src\Frontend\Variant\Domain\Variant;

final class RedisStockRepository implements StockRepository
{
    public function count(Variant $variant): int
    {
        return (int) Redis::get("variant:{$variant->uuid()->value()}:stocks");
    }
}
