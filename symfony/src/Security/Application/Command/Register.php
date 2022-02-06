<?php

declare(strict_types=1);

namespace App\Security\Application\Command;

use App\Shared\Application\Command\Command;

class Register implements Command
{
    public function __construct(
        private string $username,
        private string $email,
        private string $password
    )
    {
    }

    public function username(): string
    {
        return $this->username;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }
}
