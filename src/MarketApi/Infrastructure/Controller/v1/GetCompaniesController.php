<?php

declare(strict_types=1);

namespace App\MarketApi\Infrastructure\Controller\v1;

use App\MarketApi\Application\Query\GetCompaniesQuery;
use App\MarketApi\Infrastructure\Validator\GetCompaniesValidator;
use App\Shared\Infrastructure\Controller\v1\BaseController;
use Symfony\Component\Routing\Annotation\Route;

class GetCompaniesController extends BaseController
{
    #[Route('/market/companies', methods:['POST'])]
    public function __invoke()
    {
        $validated = GetCompaniesValidator::validateBy($this->request->content());

        $apiResponse = $this->queryBus->handle(
            new GetCompaniesQuery(
                $validated->companies()
            )
        );

        return $this->jsonApiResponseFactory->fromApiResponse($apiResponse);
    }
}