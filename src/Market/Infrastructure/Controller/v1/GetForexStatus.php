<?php

declare(strict_types=1);

namespace App\Market\Infrastructure\Controller\v1;

use App\Market\Application\Query\GetForexStatusQuery;
use App\Shared\Infrastructure\Controller\v1\BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class GetForexStatus extends BaseController
{
    #[Route('/market/status/forex', methods:['GET'])]
    public function __invoke(): JsonResponse
    {
        $apiResponse = $this->queryBus->handle(
            new GetForexStatusQuery()
        );

        return $this->jsonApiResponseFactory->fromApiResponse($apiResponse);
    }
}