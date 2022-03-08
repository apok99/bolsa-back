<?php
declare(strict_types=1);

namespace App\Season\Domain\Model;

use DateInterval;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class SeasonTemplate
{
    private UuidInterface $id;
    private string $name;
    private DateInterval $duration;
    private bool $active;

    public function __construct(
        string $name,
        DateInterval $duration,
        bool $active
    )
    {
        $this->id = Uuid::uuid4();
        $this->name = $name;
        $this->duration = $duration;
        $this->active = $active;
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function duration(): DateInterval
    {
        return $this->duration;
    }

    public function active(): bool
    {
        return $this->active;
    }

    public function update(
        string $name,
        DateInterval $duration,
        bool $active
    ): void
    {
        $this->name = $name;
        $this->duration = $duration;
        $this->active = $active;
    }
}
