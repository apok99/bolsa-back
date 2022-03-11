<?php

declare(strict_types=1);

namespace App\MarketApi\Application\Query;

use App\CQRS\Application\Query\Query;

class GetCompaniesQuery implements Query
{
    public function __construct(
        private array $companies
    )
    {
    }

    public function companies(): array
    {
        return $this->companies;
    }
}