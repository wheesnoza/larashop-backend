<?php declare(strict_types=1);

namespace Src\Frontend\Stock\Infrastructure\Persistence;

use Illuminate\Support\Facades\Redis;
use Src\Frontend\Stock\Domain\StockCountRepository;
use Src\Frontend\Variant\Domain\Variant;

final class RedisStockCountRepository implements StockCountRepository
{
    public function __invoke(Variant $variant): int
    {
        return (int) Redis::get("variant:{$variant->uuid()->value()}:stocks");
    }
}
