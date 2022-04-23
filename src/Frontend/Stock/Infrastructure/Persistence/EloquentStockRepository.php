<?php declare(strict_types=1);

namespace Src\Frontend\Stock\Infrastructure\Persistence;

use App\Shared\Models\Variant as EloquentModelVariant;
use Src\Frontend\Stock\Domain\StockRepository;
use Src\Frontend\Variant\Domain\Variant;

final class EloquentStockRepository implements StockRepository
{
    public function count(Variant $variant): int
    {
        return EloquentModelVariant::firstWhere(
            'uuid',
            $variant->uuid()
        )
        ->stock()
        ->count();
    }
}
