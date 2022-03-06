<?php

declare(strict_types=1);

namespace App\CQRS\Infrastructure\Bus;

use App\CQRS\Application\Bus\QueryBus;
use App\CQRS\Application\Query\Query;
use Symfony\Component\Messenger\HandleTrait;

class MessengerQueryBus implements QueryBus
{
    use HandleTrait {
        handle as handleQuery;
    }

    public function handle(Query $message): mixed
    {
        return $this->handleQuery($message);
    }
}
