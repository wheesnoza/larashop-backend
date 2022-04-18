<?php declare(strict_types=1);

namespace App\Frontend\Auth\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use Src\Frontend\Customer\Application\Listener\GrantWelcomeDiscountCoupon;
use Src\Frontend\Customer\Domain\CustomerCreatedDomainEvent;
use Src\Frontend\Customer\Infrastructure\Mailer\LaravelMailerSendWelcomeNotification;

final class AuthEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        CustomerCreatedDomainEvent::class => [
            GrantWelcomeDiscountCoupon::class,
            LaravelMailerSendWelcomeNotification::class,
        ],
    ];
}
