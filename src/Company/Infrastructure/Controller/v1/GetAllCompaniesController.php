<?php

declare(strict_types=1);

namespace App\Company\Infrastructure\Controller\v1;

use App\Company\Domain\Model\CompanyRepository;
use App\MarketApi\Domain\Service\MarketApi;
use App\Shared\Infrastructure\Controller\v1\BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class GetAllCompaniesController extends BaseController
{
    #[Route('/companies', methods: ['GET'])]
    public function __invoke(CompanyRepository $companyRepository, MarketApi $marketApi): JsonResponse
    {
        dd($marketApi->getCompanyPrice(
            $companyRepository->bySymbol("AAPL")
        ));
        return $this->jsonApiResponseFactory->empty();
    }
}
