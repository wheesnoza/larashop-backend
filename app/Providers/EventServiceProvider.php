<?php declare(strict_types=1);

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Src\Frontend\Customer\Domain\CustomerCreatedDomainEvent;
use Src\Frontend\Customer\Domain\SendWelcomeNotification;

final class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        CustomerCreatedDomainEvent::class => [
            SendWelcomeNotification::class,
        ],
    ];

    public function shouldDiscoverEvents()
    {
        return false;
    }
}
