<?php declare(strict_types=1);

namespace Src\Frontend\Variant\Infrastructure\Persistence;

use App\Shared\Models\Variant as EloquentModelVariant;
use Src\Frontend\Variant\Domain\Variant;
use Src\Frontend\Variant\Domain\VariantRepository;
use Src\Frontend\Variant\Domain\VariantUuid;

final class EloquentVariantRepository implements VariantRepository
{
    public function find(string|VariantUuid $uuid): Variant
    {
        return EloquentModelVariant::firstWhere('uuid', $uuid)
            ?->toDomain();
    }
}
