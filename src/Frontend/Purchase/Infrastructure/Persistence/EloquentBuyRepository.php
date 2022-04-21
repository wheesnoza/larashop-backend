<?php

namespace Src\Frontend\Purchase\Infrastructure\Persistence;

use App\Frontend\Purchase\Exceptions\NotEnoughStockException;
use Illuminate\Support\Facades\DB;
use Src\Frontend\Purchase\Domain\BuyRepository;
use Src\Frontend\Purchase\Domain\PurchaseQuantity;
use Src\Frontend\Variant\Domain\Variant;
use App\Shared\Models\Variant as EloquentModelVariant;

class EloquentBuyRepository implements BuyRepository
{
    public function buy(Variant $variant, PurchaseQuantity $quantity, callable $callable): void
    {
        DB::transaction(function () use ($variant, $quantity, $callable) {
            $variantModel = EloquentModelVariant::firstWhere('uuid', $variant->uuid());

            $stock = $variantModel
                ->stock()
                ->limit($quantity->value())
                ->lockForUpdate()
                ->get();

            if ($quantity->isBiggerThan($stock->count())) {
                throw (new NotEnoughStockException())
                    ->setVariant($variant);
            }

            $callable();

            $stock->map->delete();
        });
    }
}
