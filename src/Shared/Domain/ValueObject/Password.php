<?php

declare(strict_types=1);

namespace Src\Shared\Domain\ValueObject;

use Illuminate\Support\Facades\Hash;
use Stringable;

class Password implements Stringable
{
    protected string $value;

    public function __construct(string $value)
    {
        $this->value = Hash::needsRehash($value) ? Hash::make($value) : $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function check(string $plain): bool
    {
        return Hash::check($plain, $this->value());
    }

    public function __toString()
    {
        return $this->value;
    }
}
