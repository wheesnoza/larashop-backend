<?php declare(strict_types=1);

namespace Src\Frontend\Variant\Infrastructure\Persistence;

use App\Shared\Models\Variant;
use Illuminate\Database\Eloquent\Collection;
use Src\Frontend\Purchase\Domain\PurchaseQuantity;
use Src\Frontend\Variant\Domain\EnsureVariantStockRepository;
use Src\Frontend\Variant\Domain\VariantUuid;

final class EloquentEnsureVariantStockRepository implements EnsureVariantStockRepository
{
    private Collection $stock;

    public function ensure(VariantUuid $variantUuid, PurchaseQuantity $quantity): self
    {
        $this->stock = Variant::firstWhere('uuid', $variantUuid)
            ->stock()
            ->limit($quantity->value())
            ->lockForUpdate()
            ->get();

        return $this;
    }

    public function reduce(): void
    {
        $this->stock->map->delete();
    }
}
