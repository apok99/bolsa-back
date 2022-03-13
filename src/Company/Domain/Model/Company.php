<?php

declare(strict_types=1);

namespace App\Company\Domain\Model;

use Carbon\CarbonImmutable;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Company
{
    private UuidInterface $id;
    private string $symbol;
    private bool $active;
    private CarbonImmutable $createdAt;
    private CarbonImmutable $updatedAt;
    private ?CarbonImmutable $deletedAt;

    public function __construct(
        string $symbol,
        ?bool $active = null
    )
    {
        $this->id = Uuid::uuid4();
        $this->symbol = $symbol;
        $this->active = $active ?? false;
        $this->createdAt = $this->updatedAt = CarbonImmutable::now()->utc();
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function symbol(): string
    {
        return $this->symbol;
    }

    public function active(): bool
    {
        return $this->active;
    }

    public function createdAt(): CarbonImmutable
    {
        return $this->createdAt;
    }

    public function updatedAt(): CarbonImmutable
    {
        return $this->updatedAt;
    }

    public function deletedAt(): ?CarbonImmutable
    {
        return $this->deletedAt;
    }

    public function delete(): void
    {
        $this->deletedAt = CarbonImmutable::now()->utc();
    }
}
