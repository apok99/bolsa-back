<?php

declare(strict_types=1);

namespace App\Season\Domain\Model;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Season
{
    private UuidInterface $id;
    private CarbonImmutable $startDate;
    private CarbonImmutable $endDate;

    public function __construct(
        CarbonImmutable $startDate,
        CarbonImmutable $endDate
    )
    {
        $this->id = Uuid::uuid4();
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function startDate(): CarbonImmutable
    {
        return $this->startDate;
    }

    public function endDate(): CarbonImmutable
    {
        return $this->endDate;
    }
}
