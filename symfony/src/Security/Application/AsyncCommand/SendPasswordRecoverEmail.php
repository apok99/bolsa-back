<?php

declare(strict_types=1);

namespace App\Security\Application\AsyncCommand;

use App\Shared\Application\Command\AsyncCommand;
use Ramsey\Uuid\UuidInterface;

class SendPasswordRecoverEmail implements AsyncCommand
{
    public function __construct(
        private UuidInterface $uuid
    )
    {
    }

    public function uuid(): UuidInterface
    {
        return $this->uuid;
    }
}
