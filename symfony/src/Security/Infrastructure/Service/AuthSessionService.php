<?php

namespace App\Security\Infrastructure\Service;

use App\Security\Domain\Service\AuthSessionServiceInterface;
use App\User\Domain\Model\User;
use App\User\Domain\Model\UserRepository;
use Symfony\Component\Security\Core\Security;

class AuthSessionService implements AuthSessionServiceInterface
{
    private Security $security;
    private UserRepository $userRepository;

    public function __construct(
        Security $security,
        UserRepository $userRepository
    )
    {
        $this->security = $security;
        $this->userRepository = $userRepository;
    }

    public function user(): User
    {
        return $this->userRepository->byEmail(
            $this->security->getUser()->getUserIdentifier()
        );
    }
}
