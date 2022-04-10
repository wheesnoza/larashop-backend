<?php declare(strict_types=1);

namespace Src\Frontend\Product\Domain;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Src\Shared\Domain\Bus\Event\DomainEvent;

final class ProductCreatedDomainEvent implements DomainEvent
{
    use Dispatchable;
    use InteractsWithSockets;

    public Product $customer;

    public function __construct(Product $customer)
    {
        $this->customer = $customer;
    }
}
