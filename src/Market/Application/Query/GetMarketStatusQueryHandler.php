<?php

declare(strict_types=1);

namespace App\Market\Application\Query;

use App\Api\Domain\ValueObject\ApiResponse;
use App\CQRS\Application\Query\QueryHandler;
use App\Market\Domain\Service\MarketApi;

class GetMarketStatusQueryHandler implements QueryHandler
{
    public function __construct(
        private MarketApi $marketApi
    )
    {
    }

    public function __invoke(GetMarketStatusQuery $query): ApiResponse
    {
        return new ApiResponse(
            $this->marketApi->isStockMarketOpen()
        );
    }
}