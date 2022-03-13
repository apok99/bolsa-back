<?php

declare(strict_types=1);

namespace App\Market\Application\Query;

use App\Api\Domain\ValueObject\ApiResponse;
use App\Company\Domain\Model\CompanyRepository;
use App\CQRS\Application\Query\QueryHandler;
use App\Market\Domain\Service\MarketApi;

class GetAllCompaniesQueryHandler implements QueryHandler
{
    public function __construct(
        private CompanyRepository $companyRepository,
        private MarketApi $marketApi
    )
    {
    }

    public function __invoke(GetAllCompaniesQuery $query): ApiResponse
    {
        $companies = $this->companyRepository->getAllActive();

        $marketCompanies = $this->marketApi->getCompanies($companies);

        return new ApiResponse($marketCompanies);
    }
}
