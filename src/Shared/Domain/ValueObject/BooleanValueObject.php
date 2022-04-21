<?php declare(strict_types=1);

namespace Src\Shared\Domain\ValueObject;

abstract class BooleanValueObject
{
    protected bool $value;

    public function __construct(bool $value)
    {
        $this->value = $value;
    }

    final public function value(): bool
    {
        return $this->value;
    }
}
