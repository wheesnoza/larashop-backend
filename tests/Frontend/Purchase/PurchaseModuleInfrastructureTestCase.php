<?php

declare(strict_types=1);

namespace Tests\Frontend\Purchase;

use Src\Frontend\Purchase\Domain\PurchaseRepository;
use Tests\TestCase;

abstract class PurchaseModuleInfrastructureTestCase extends TestCase
{
    protected function repository(): PurchaseRepository
    {
        return app(PurchaseRepository::class);
    }
}
