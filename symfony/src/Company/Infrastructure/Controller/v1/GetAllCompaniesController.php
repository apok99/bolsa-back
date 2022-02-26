<?php

declare(strict_types=1);

namespace App\Company\Infrastructure\Controller\v1;

use App\Api\Domain\ValueObject\ApiResponse;
use App\Security\Domain\Service\AuthSessionServiceInterface;
use App\Shared\Infrastructure\Controller\v1\BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class GetAllCompaniesController extends BaseController
{
    #[Route('/companies', methods: ['GET'])]
    public function __invoke(
        AuthSessionServiceInterface $authSessionService,
        MailerInterface $mailer
    ): JsonResponse
    {
        $mail = new Email();
        $mail->to('test@ateasd.com')->from('from@from.com')->subject('Subject')->text('Contents');
        $mailer->send($mail);

        $user = $authSessionService->user();

        $response = new ApiResponse([
            "user" => $user
        ]);

        return $this->jsonApiResponseFactory->fromApiResponse($response);
    }
}
