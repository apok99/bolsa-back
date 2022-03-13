<?php

declare(strict_types=1);

namespace App\Security\Domain\Event\PasswordRecoveryToken;

use App\CQRS\Domain\Event\DomainEvent;
use Carbon\CarbonImmutable;
use Ramsey\Uuid\UuidInterface;

class PasswordRecoveryTokenRequested implements DomainEvent
{
    private UuidInterface $id;
    private CarbonImmutable $occurredOn;

    public function __construct(
        UuidInterface $userUuid
    )
    {
        $this->id = $userUuid;
        $this->occurredOn = CarbonImmutable::now()->utc();
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function occurredOn(): CarbonImmutable
    {
        return $this->occurredOn;
    }
}
