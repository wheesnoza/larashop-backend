<?php declare(strict_types=1);

namespace Src\Frontend\Customer\Domain;

use App\Mail\WelcomeNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

final class SendWelcomeNotification implements ShouldQueue
{
    public function handle(CustomerCreatedDomainEvent $event)
    {
        Mail::to($event->customer->email()->value())
            ->send(new WelcomeNotification($event->customer));
    }
}
