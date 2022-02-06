<?php

declare(strict_types=1);

namespace App\Shared\Application\Command;

interface CommandHandler
{
    public function __invoke(Command $command);
}
