<?php

declare(strict_types=1);

namespace App\Shared\Domain\Event;

use Carbon\CarbonImmutable;

interface DomainEvent
{
    public function occurredOn(): CarbonImmutable;
}
