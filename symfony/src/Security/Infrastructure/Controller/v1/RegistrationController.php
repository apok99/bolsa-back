<?php

declare(strict_types=1);

namespace App\Security\Infrastructure\Controller\v1;

use App\Shared\Infrastructure\Controller\v1\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends BaseController
{
    #[Route('/register', methods: ['POST'])]
    public function __invoke()
    {
        dd($this->request());

        return $this->json("register");
    }
}
