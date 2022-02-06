<?php

declare(strict_types=1);

namespace App\Shared\Application\Bus;

use App\Shared\Application\Query\Query;

interface QueryBus
{
    public function handle(Query $message): mixed;
}
