<?php declare(strict_types=1);

namespace Src\Frontend\Customer\Infrastructure;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Src\Frontend\Customer\Domain\CustomerCreatedDomainEvent;

final class LaravelCustomerCreatedDomainEvent extends CustomerCreatedDomainEvent
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;
}
