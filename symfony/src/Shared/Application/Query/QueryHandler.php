<?php

declare(strict_types=1);

namespace App\Shared\Application\Query;

interface QueryHandler
{
    public function __invoke(Query $command);
}
