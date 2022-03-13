<?php

declare(strict_types=1);

namespace App\Market\Application\Query;

use App\CQRS\Application\Query\Query;

class GetCompaniesQuery implements Query
{
    public function __construct(
        private array $symbols
    )
    {
    }

    public function symbols(): array
    {
        return $this->symbols;
    }
}