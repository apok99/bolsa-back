<?php

declare(strict_types=1);

namespace App\Shared\Domain\Event;

class DomainEventPublisher
{
    private array $events = [];
    private static ?DomainEventPublisher $instance = null;

    public static function instance(): self
    {
        if (null === static::$instance)
        {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public static function publish(DomainEvent $event)
    {
        self::instance()->events[] = $event;
    }

    public static function events(): array
    {
        return self::instance()->events;
    }
}
