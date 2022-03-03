<?php

declare(strict_types=1);

namespace App\Company\Infrastructure\Controller\v1;

use App\Api\Domain\ValueObject\ApiResponse;
use App\MarketApi\Domain\MarketApi;
use App\Security\Domain\Service\AuthSessionServiceInterface;
use App\Security\Domain\Service\UrlSignerInterface;
use App\Shared\Infrastructure\Controller\v1\BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\UriSigner;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class GetAllCompaniesController extends BaseController
{
    #[Route('/companies', methods: ['GET'])]
    public function __invoke(
        AuthSessionServiceInterface $authSessionService,
        MailerInterface $mailer,
        MarketApi $marketApi,
        UrlSignerInterface $urlSigner
    ): JsonResponse
    {
        $signedUrl = $urlSigner->setUrl('https://capitale.fun/api/v1/security/new-password')
            ->setUser($authSessionService->user())
            ->addSeconds(100)->getSignedUrl();

        dd($urlSigner->verify($signedUrl));

        dd($marketApi->getCompany('AAPL'));

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
