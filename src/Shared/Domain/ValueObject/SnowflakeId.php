<?php declare(strict_types=1);

namespace Src\Shared\Domain\ValueObject;

use InvalidArgumentException;
use Stringable;

abstract class SnowflakeId implements Stringable
{
    private string $value;

    public function __construct(string $value)
    {
        $this->ensureIsValid($value);

        $this->value = $value;
    }

    final public static function generate(): static
    {
        return new static(snowflake());
    }

    final public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    final public function equals(Uuid $other): bool
    {
        return $this->value() === $other->value();
    }

    private function ensureIsValid(string $value): void
    {
        if (! ctype_digit($value)) {
            throw new InvalidArgumentException(
                sprintf(
                    '<%s> does not allow the value <%s>.',
                    static::class,
                    $value
                )
            );
        }
    }
}
