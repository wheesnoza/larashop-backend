<?php declare(strict_types=1);

namespace App\Frontend\Order\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use Src\Frontend\Order\Domain\OrderCreatedDomainEvent;
use Src\Frontend\Order\Infrastructure\Mailer\LaravelMailerSendOrderReceivedNotification;

final class OrderEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        OrderCreatedDomainEvent::class => [
            LaravelMailerSendOrderReceivedNotification::class,
        ]
    ];
}
