<?php

declare(strict_types=1);

namespace App\Company\Infrastructure\Controller\v1;

use App\Company\Application\Command\AddCompanies;
use App\Company\Infrastructure\Validator\AddCompaniesValidator;
use App\Shared\Infrastructure\Controller\v1\BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class AddCompaniesController extends BaseController
{
    #[Route('/companies/add', methods: ['POST'])]
    public function __invoke(): JsonResponse
    {
        $validated = AddCompaniesValidator::validateBy($this->request->content());

        $this->commandBus->handle(
            new AddCompanies($validated->companies())
        );

        return $this->jsonApiResponseFactory->empty();
    }
}
