<?php

declare(strict_types=1);

namespace App\CQRS\Application\Bus;

use App\Api\Domain\ValueObject\ApiResponse;
use App\CQRS\Application\Query\Query;

interface QueryBus
{
    public function handle(Query $message): ApiResponse;
}
