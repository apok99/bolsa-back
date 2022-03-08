<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Listener\Kernel;

use App\Shared\Domain\Event\DomainEventPublisher;
use Symfony\Component\HttpKernel\Event\TerminateEvent;
use Symfony\Component\Messenger\MessageBusInterface;

class DispatchEventsOnKernelTerminate
{
    public function __construct(
        private MessageBusInterface $eventBus
    )
    {
    }

    public function onKernelTerminate(TerminateEvent $event): void
    {
        $publishedEvents = DomainEventPublisher::events();

        foreach ($publishedEvents as $publishedEvent)
        {
            $this->eventBus->dispatch($publishedEvent);
        }
    }
}
