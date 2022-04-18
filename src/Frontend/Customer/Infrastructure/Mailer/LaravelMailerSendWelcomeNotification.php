<?php declare(strict_types=1);

namespace Src\Frontend\Customer\Infrastructure\Mailer;

use App\Frontend\Auth\Mail\WelcomeNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Src\Frontend\Customer\Application\Listener\SendWelcomeNotification;
use Src\Frontend\Customer\Domain\CustomerCreatedDomainEvent;

final class LaravelMailerSendWelcomeNotification implements SendWelcomeNotification, ShouldQueue
{
    public function handle(CustomerCreatedDomainEvent $event): void
    {
        Mail::to($event->customer->email()->value())
            ->send(new WelcomeNotification($event->customer));
    }
}
