<?php

declare(strict_types=1);

namespace App\Security\Application\Command;

use App\CQRS\Application\Command\Command;

class RecoverPassword implements Command
{
    public function __construct(
        private string $email
    )
    {
    }

    public function email(): string
    {
        return $this->email;
    }
}
