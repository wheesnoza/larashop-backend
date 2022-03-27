<?php declare(strict_types=1);

namespace Src\Shared\Domain;

use Src\Shared\Domain\Bus\Event\DomainEvent;
use Src\Shared\Domain\Bus\Event\EventBus;

final class LaravelEventBus implements EventBus
{
    public function publish(DomainEvent ...$events): void
    {
        foreach ($events as $event) {
            event($event);
        }
    }
}
