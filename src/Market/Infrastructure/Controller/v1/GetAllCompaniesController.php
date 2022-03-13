<?php

declare(strict_types=1);

namespace App\Market\Infrastructure\Controller\v1;

use App\Market\Application\Query\GetAllCompaniesQuery;
use App\Shared\Infrastructure\Controller\v1\BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class GetAllCompaniesController extends BaseController
{
    #[Route('/market/companies', methods:['GET'])]
    public function __invoke(): JsonResponse
    {
        $apiResponse = $this->queryBus->handle(new GetAllCompaniesQuery());

        return $this->jsonApiResponseFactory->fromApiResponse($apiResponse);
    }
}
