<?php

declare(strict_types=1);

namespace App\Transaction\Domain\Model;

use App\Season\Domain\Model\Season;
use App\Shared\Domain\ValueObject\EntityReference;
use App\User\Domain\Model\User;
use Carbon\CarbonImmutable;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Transaction
{
    private UuidInterface $id;
    private EntityReference $asset;
    private string $price;
    private string $amount;
    private User $user;
    private Season $season;
    private bool $isBuy;
    private CarbonImmutable $occurredAt;

    public function __construct(
        EntityReference $asset,
        string $price,
        string $amount,
        User $user,
        Season $season,
        bool $isBuy
    )
    {
        $this->id = Uuid::uuid4();
        $this->asset = $asset;
        $this->price = $price;
        $this->amount = $amount;
        $this->user = $user;
        $this->season = $season;
        $this->isBuy = $isBuy;
        $this->occurredAt = CarbonImmutable::now()->utc();
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function asset(): EntityReference
    {
        return $this->asset;
    }

    public function price(): string
    {
        return $this->price;
    }

    public function amount(): string
    {
        return $this->amount;
    }

    public function user(): User
    {
        return $this->user;
    }

    public function season(): Season
    {
        return $this->season;
    }

    public function isBuy(): bool
    {
        return $this->isBuy;
    }

    public function occurredAt(): CarbonImmutable
    {
        return $this->occurredAt;
    }
}