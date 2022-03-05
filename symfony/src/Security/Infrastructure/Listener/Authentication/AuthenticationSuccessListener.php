<?php

declare(strict_types=1);

namespace App\Security\Infrastructure\Listener\Authentication;

use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Symfony\Component\Security\Core\User\UserInterface;

class AuthenticationSuccessListener
{
    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event): void
    {
        if (!$event->getUser() instanceof UserInterface)
        {
            return;
        }

        $eventData = $event->getData();
        // TODO: Would be nice to use the ApiResponse class instead of hard-coding the array
        $data = [
            'data' => [
                'token' => $eventData['token'],
                'refreshToken' => $eventData['refreshToken']
            ]
        ];

        $event->setData($data);
    }
}
