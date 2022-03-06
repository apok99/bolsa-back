<?php

declare(strict_types=1);

namespace App\Security\Domain\Event\PasswordRecoveryToken;

use App\Shared\Domain\Event\DomainEvent;
use Carbon\CarbonImmutable;
use Ramsey\Uuid\UuidInterface;

class PasswordRecoveryTokenRequested implements DomainEvent
{
    private UuidInterface $userUuid;
    private CarbonImmutable $occurredOn;

    public function __construct(
        UuidInterface $userUuid
    )
    {
        $this->userUuid = $userUuid;
        $this->occurredOn = CarbonImmutable::now()->utc();
    }

    public function userUuid(): UuidInterface
    {
        return $this->userUuid;
    }

    public function occurredOn(): CarbonImmutable
    {
        return $this->occurredOn;
    }
}
