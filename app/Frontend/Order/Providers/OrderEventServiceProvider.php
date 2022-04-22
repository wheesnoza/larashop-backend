<?php

namespace App\Frontend\Order\Providers;


use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use Src\Frontend\Order\Domain\OrderCreatedDomainEvent;
use Src\Frontend\Order\Infrastructure\Mailer\LaravelMailerSendOrderReceivedNotification;

class OrderEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        OrderCreatedDomainEvent::class => [
            LaravelMailerSendOrderReceivedNotification::class,
        ]
    ];
}
