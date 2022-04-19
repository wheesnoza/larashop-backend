<?php declare(strict_types=1);

namespace Src\Frontend\Purchase\Domain;

use InvalidArgumentException;
use Src\Shared\Domain\ValueObject\IntValueObject;

final class PurchaseQuantity extends IntValueObject
{
    private int $maxQuantity = 10;

    public function __construct(int $value)
    {
        if ($value > $this->maxQuantity) {
            throw new InvalidArgumentException(
                sprintf(
                    '<%s> does not allow value greater than <%d>.',
                    static::class,
                    $this->maxQuantity
                )
            );
        }

        parent::__construct($value);
    }
}
