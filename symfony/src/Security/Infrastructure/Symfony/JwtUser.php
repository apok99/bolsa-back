<?php

declare(strict_types=1);

namespace App\Security\Infrastructure\Symfony;

use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class JwtUser implements UserInterface, PasswordAuthenticatedUserInterface
{
    public function __construct(
        private string $userId,
        private string $email,
        private string $hashedPassword,
        private array $roles
    )
    {
    }

    public function userId(): string
    {
        return $this->userId;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function eraseCredentials()
    {
    }

    public function email(): string
    {
        return $this->email;
    }

    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    public function getPassword(): ?string
    {
        return $this->hashedPassword;
    }
}
