<?php declare(strict_types=1);

namespace Src\Shared\Infrastructure\Bus\Event;

use Src\Shared\Domain\Bus\Event\DomainEvent;
use Src\Shared\Domain\Bus\Event\EventBus;
use function event;

final class LaravelEventBus implements EventBus
{
    public function publish(DomainEvent ...$events): void
    {
        foreach ($events as $event) {
            event($event);
        }
    }
}
