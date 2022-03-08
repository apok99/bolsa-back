<?php

declare(strict_types=1);

namespace App\CQRS\Domain\Event;

use Carbon\CarbonImmutable;

interface DomainEvent
{
    public function occurredOn(): CarbonImmutable;
}
