<?php

declare(strict_types=1);

namespace App\Market\Infrastructure\Controller\v1;

use App\Market\Application\Query\GetCompaniesQuery;
use App\Market\Infrastructure\Validator\GetCompaniesValidator;
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
                $validated->symbols()
            )
        );

        return $this->jsonApiResponseFactory->fromApiResponse($apiResponse);
    }
}