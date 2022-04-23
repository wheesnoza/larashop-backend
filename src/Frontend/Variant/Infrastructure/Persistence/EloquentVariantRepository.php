<?php declare(strict_types=1);

namespace Src\Frontend\Variant\Infrastructure\Persistence;

use App\Shared\Models\Variant as EloquentModelVariant;
use Src\Frontend\Variant\Domain\Variant;
use Src\Frontend\Variant\Domain\VariantRepository;
use Src\Frontend\Variant\Domain\VariantId;

final class EloquentVariantRepository implements VariantRepository
{
    public function find(VariantId $id): Variant
    {
        return EloquentModelVariant::find($id)
            ?->toDomain();
    }
}
