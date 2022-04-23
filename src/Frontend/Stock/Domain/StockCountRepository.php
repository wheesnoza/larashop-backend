<?php declare(strict_types=1);

namespace Src\Frontend\Stock\Domain;

use Src\Frontend\Variant\Domain\Variant;

interface StockCountRepository
{
    public function __invoke(Variant $variant): int;
}
