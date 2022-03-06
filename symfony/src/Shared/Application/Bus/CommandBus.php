<?php

declare(strict_types=1);

namespace App\Shared\Application\Bus;

use App\Shared\Application\Command\AsyncCommand;
use App\Shared\Application\Command\Command;

interface CommandBus
{
    public function dispatch(Command|AsyncCommand $command): mixed;
}
