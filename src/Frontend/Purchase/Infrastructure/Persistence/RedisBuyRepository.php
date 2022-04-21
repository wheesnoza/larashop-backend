<?php

namespace Src\Frontend\Purchase\Infrastructure\Persistence;

use App\Frontend\Purchase\Exceptions\NotEnoughStockException;
use Illuminate\Support\Facades\Redis;
use Src\Frontend\Purchase\Domain\BuyRepository;
use Src\Frontend\Purchase\Domain\PurchaseQuantity;
use Src\Frontend\Variant\Domain\Variant;

class RedisBuyRepository implements BuyRepository
{

    public function buy(Variant $variant, PurchaseQuantity $quantity, callable $callable): void
    {
        $stock = (int) Redis::get("variant:{$variant->uuid()->value()}:stocks");

        if ($quantity->isBiggerThan($stock)) {
            throw (new NotEnoughStockException())
                ->setVariant($variant);
        }

        $callable();

        Redis::decrby("variant:{$variant->uuid()->value()}:stocks", $quantity->value());
    }
}
