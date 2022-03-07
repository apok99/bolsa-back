<?php

declare(strict_types=1);

namespace App\Security\Infrastructure\Controller\v1;

use App\Security\Application\Command\Register;
use App\Security\Infrastructure\Validator\RegisterValidator;
use App\Shared\Infrastructure\Controller\v1\BaseController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class RegistrationController extends BaseController
{
    #[Route('/register', methods: ['POST'])]
    public function __invoke(SerializerInterface $serializer)
    {
        $validated = RegisterValidator::validateBy($this->request->content());

        $id = $this->commandBus->handle(
            new Register(
                $validated->username(),
                $validated->email(),
                $validated->password()
            )
        );

        return $this->jsonApiResponseFactory->withCreatedId($id->getResult());
    }
}
