<?php

namespace App\Frontend\Purchase\Providers;


use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use Src\Frontend\Purchase\Domain\PurchaseCreatedDomainEvent;
use Src\Frontend\Purchase\Infrastructure\Mailer\LaravelMailerSendOrderReceivedNotification;

class PurchaseEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        PurchaseCreatedDomainEvent::class => [
            LaravelMailerSendOrderReceivedNotification::class,
        ]
    ];
}
