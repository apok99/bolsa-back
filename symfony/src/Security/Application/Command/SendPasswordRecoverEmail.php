<?php

declare(strict_types=1);

namespace App\Security\Application\Command;

use App\CQRS\Application\Command\Command;
use Ramsey\Uuid\UuidInterface;

class SendPasswordRecoverEmail implements Command
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
