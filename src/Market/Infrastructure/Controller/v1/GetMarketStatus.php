<?php

declare(strict_types=1);

namespace App\Market\Infrastructure\Controller\v1;

use App\Market\Application\Query\GetMarketStatusQuery;
use App\Shared\Infrastructure\Controller\v1\BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class GetMarketStatus extends BaseController
{
    #[Route('/market/status', methods:['GET'])]
    public function __invoke(): JsonResponse
    {
        $apiResponse = $this->queryBus->handle(
            new GetMarketStatusQuery()
        );

        return $this->jsonApiResponseFactory->fromApiResponse($apiResponse);
    }
}