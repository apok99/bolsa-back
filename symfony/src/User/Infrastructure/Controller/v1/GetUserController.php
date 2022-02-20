<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Controller\v1;

use App\Shared\Infrastructure\Controller\v1\BaseController;
use Symfony\Component\Routing\Annotation\Route;

class GetUserController extends BaseController
{
    #[Route('/users/{userId}', methods: ["GET"])]
    public function __invoke(string $userId)
    {
        dd($userId);
        return $this->jsonApiResponseFactory->empty();
    }
}
