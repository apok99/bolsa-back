<?php

declare(strict_types=1);

namespace App\CQRS\Application\Bus;

use App\CQRS\Application\Command\Command;

interface CommandBus
{
    public function handle(Command $command): mixed;
}
