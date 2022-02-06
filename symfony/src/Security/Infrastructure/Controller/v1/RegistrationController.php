<?php

declare(strict_types=1);

namespace App\Security\Infrastructure\Controller\v1;

use App\Security\Application\Command\Register;
use App\Shared\Infrastructure\Controller\v1\BaseController;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends BaseController
{
    #[Route('/register', methods: ['POST'])]
    public function __invoke()
    {
        $this->commandBus->dispatch(new Register("e-aleix", "e.aleixandre@asdasd.com", "sup3rs3cr3t"));
    }
}
