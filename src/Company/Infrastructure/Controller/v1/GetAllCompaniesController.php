<?php

declare(strict_types=1);

namespace App\Company\Infrastructure\Controller\v1;

use App\Shared\Infrastructure\Controller\v1\BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class GetAllCompaniesController extends BaseController
{
    #[Route('/companies', methods: ['GET'])]
    public function __invoke(): JsonResponse
    {
        return $this->jsonApiResponseFactory->empty();
    }
}
