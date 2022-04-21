<?php declare(strict_types=1);

namespace Src\Shared\Domain\ValueObject;

abstract class FloatValueObject
{
    protected float $value;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    final public function value(): float
    {
        return $this->value;
    }
}
