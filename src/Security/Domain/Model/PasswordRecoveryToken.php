<?php

declare(strict_types=1);

namespace App\Security\Domain\Model;

use App\User\Domain\Model\User;
use Carbon\CarbonImmutable;
use Ramsey\Uuid\UuidInterface;

class PasswordRecoveryToken
{
    private string $token;
    private UuidInterface $userId;
    private CarbonImmutable $expiresAt;

    public function __construct(
        UuidInterface $userId
    )
    {
        $this->token = sha1(uniqid($userId->toString(), true));
        $this->userId = $userId;
        $this->expiresAt = CarbonImmutable::now()->utc()->addDay();
    }

    public function token(): string
    {
        return $this->token;
    }

    public function userId(): UuidInterface
    {
        return $this->userId;
    }

    public function expiresAt(): CarbonImmutable
    {
        return $this->expiresAt;
    }
}
