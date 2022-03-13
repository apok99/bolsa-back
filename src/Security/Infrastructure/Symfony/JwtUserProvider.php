<?php

declare(strict_types=1);

namespace App\Security\Infrastructure\Symfony;

use App\User\Domain\Model\User;
use App\User\Domain\Model\UserRepository;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

final class JwtUserProvider implements UserProviderInterface
{
    public function __construct(
        private UserRepository $userRepository
    )
    {
    }

    public function refreshUser(UserInterface $user): UserInterface
    {
        return $user;
    }

    public function supportsClass(string $class)
    {
        return $class === JwtUser::class;
    }

    public function loadUserByIdentifier(string $identifier): UserInterface
    {
        $user = $this->userRepository->byEmail($identifier);

        if (null === $user)
        {
            throw new UserNotFoundException();
        }

        return new JwtUser(
            $user->id()->toString(),
            $user->email()->value(),
            $user->password(),
            $user->roles()
        );
    }
}
