<?php

declare(strict_types=1);

namespace App\Security\Application\Command;

use App\Shared\Application\Command\Command;
use App\Shared\Application\Command\CommandHandler;

class RegisterHandler implements CommandHandler
{
    public function __invoke(Register|Command $command): void
    {
        dd($command);
    }
}
