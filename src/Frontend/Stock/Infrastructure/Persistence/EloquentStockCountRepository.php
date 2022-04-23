<?php declare(strict_types=1);

namespace Src\Frontend\Stock\Infrastructure\Persistence;

use App\Shared\Models\Variant as EloquentModelVariant;
use Src\Frontend\Stock\Domain\StockCountRepository;
use Src\Frontend\Variant\Domain\Variant;

final class EloquentStockCountRepository implements StockCountRepository
{
    public function __invoke(Variant $variant): int
    {
        return EloquentModelVariant::find(
            $variant->id()
        )
        ->stock()
        ->count();
    }
}
