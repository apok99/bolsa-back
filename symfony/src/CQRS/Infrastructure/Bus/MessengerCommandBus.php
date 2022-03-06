<?php

declare(strict_types=1);

namespace App\CQRS\Infrastructure\Bus;

use App\CQRS\Application\Bus\CommandBus;
use App\CQRS\Application\Command\Command;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;
use Symfony\Component\Messenger\Stamp\StampInterface;

class MessengerCommandBus implements CommandBus
{
    public function __construct(
        private MessageBusInterface $commandBus
    )
    {
    }

    public function dispatch(Command $command): ?StampInterface
    {
        return $this->commandBus->dispatch($command)->last(HandledStamp::class);
    }
}
