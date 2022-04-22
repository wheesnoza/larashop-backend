<?php

namespace Src\Frontend\Stock\Infrastructure\Persistence;

use App\Shared\Models\Variant as EloquentModelVariant;
use Illuminate\Database\Eloquent\Collection;
use Src\Frontend\Purchase\Domain\OrderQuantity;
use Src\Frontend\Stock\Domain\StockRepository;
use Src\Frontend\Variant\Domain\Variant;

class EloquentStockRepository implements StockRepository
{
    private Collection $stock;

    public function ensure(Variant $variant, OrderQuantity $quantity): self
    {
        $variantModel = EloquentModelVariant::firstWhere(
            'uuid',
            $variant->uuid()
        );

        $this->stock = $variantModel
            ->stock()
            ->limit($quantity->value())
            ->lockForUpdate()
            ->get();

        return $this;
    }

    public function count(): int
    {
        return $this->stock->count();
    }

    public function reduce(): void
    {
        $this->stock->map->delete();
    }
}
