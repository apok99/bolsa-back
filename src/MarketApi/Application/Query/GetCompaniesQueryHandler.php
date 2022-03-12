<?php

declare(strict_types=1);

namespace App\MarketApi\Application\Query;

use App\Api\Domain\ValueObject\ApiResponse;
use App\Company\Domain\Model\CompanyRepository;
use App\CQRS\Application\Query\QueryHandler;
use App\MarketApi\Domain\Service\MarketApi;

class GetCompaniesQueryHandler implements QueryHandler
{
    public function __construct(
        private CompanyRepository $companyRepository,
        private MarketApi $marketApi
    )
    {
    }

    public function __invoke(GetCompaniesQuery $query): ApiResponse
    {
        $companies = $this->companyRepository->bySymbols($query->symbols());

        $response = $this->marketApi->getCompanies($companies);

        return new ApiResponse($response);
    }
}