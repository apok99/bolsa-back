<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Bus;

use App\Shared\Application\Bus\QueryBus;
use App\Shared\Application\Query\Query;
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
