<?php

declare(strict_types=1);

namespace App\Security\Infrastructure\Listener\Authentication;

use App\Api\Infrastructure\JsonApiResponseFactory;
use App\Shared\Domain\Validator\ValidatorMessage;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationFailureEvent;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\Exception\TooManyLoginAttemptsAuthenticationException;

class AuthenticationFailureListener
{
    public function __construct(
        private JsonApiResponseFactory $jsonApiResponseFactory
    )
    {
    }

    public function onAuthenticationFailureResponse(AuthenticationFailureEvent $event): void
    {
        $exception = $event->getException();

        if ($exception instanceof TooManyLoginAttemptsAuthenticationException)
        {
            $event->setResponse(
                $this->jsonApiResponseFactory->fromErrorsArray(
                    [
                        'login' => ValidatorMessage::TOO_MANY_LOGIN_ATTEMPTS
                    ]
                )
            );

            return;
        }

        if ($exception instanceof BadCredentialsException)
        {
            $event->setResponse(
                $this->jsonApiResponseFactory->fromErrorsArray(
                    [
                        'login' => ValidatorMessage::BAD_CREDENTIALS
                    ]
                )
            );
        }
    }
}
