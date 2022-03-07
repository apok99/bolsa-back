<?php

declare(strict_types=1);

namespace App\CQRS\Infrastructure\Bus;

use App\Api\Domain\ValueObject\ApiResponse;
use App\CQRS\Application\Bus\QueryBus;
use App\CQRS\Application\Query\Query;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

class MessengerQueryBus implements QueryBus
{
    public function __construct(MessageBusInterface $queryBus)
    {
        $this->messageBus = $queryBus;
    }

    use HandleTrait {
        handle as handleQuery;
    }

    public function handle(Query $message): ApiResponse
    {
        return $this->handleQuery($message);
    }
}
