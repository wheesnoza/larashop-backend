<?php declare(strict_types=1);

namespace App\Shared\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

final class SnowflakeId implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        return (string) $value;
    }

    /**
     * @inheritDoc
     */
    public function set($model, string $key, $value, array $attributes)
    {
        if ($value instanceof \Src\Shared\Domain\ValueObject\SnowflakeId) {
            return (int) $value->value();
        }

        return (int) $value;
    }
}
