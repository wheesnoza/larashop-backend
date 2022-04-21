<?php declare(strict_types=1);

namespace Src\Shared\Domain\ValueObject;

abstract class IntValueObject
{
    protected int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    final public function value(): int
    {
        return $this->value;
    }

    final public function isBiggerThan(int|IntValueObject $other): bool
    {
        if ($other instanceof IntValueObject) {
            return $this->value() > $other->value();
        }

        return $this->value() > $other;
    }
}
