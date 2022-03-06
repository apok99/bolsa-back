<?php

declare(strict_types=1);

namespace App\Security\Infrastructure\Controller\v1;

use App\Security\Application\Command\RecoverPassword;
use App\Security\Infrastructure\Validator\RecoverPasswordValidator;
use App\Shared\Infrastructure\Controller\v1\BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class RecoverPasswordController extends BaseController
{
    #[Route('/recover-password', methods: ['POST'])]
    public function __invoke(): JsonResponse
    {
        $validated = RecoverPasswordValidator::validateBy($this->request->content());

        $this->commandBus->dispatch(
            new RecoverPassword(
                $validated->email()
            )
        );

        return $this->jsonApiResponseFactory->empty();
    }
}
