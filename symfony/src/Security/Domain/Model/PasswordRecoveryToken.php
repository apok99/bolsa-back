<?php

declare(strict_types=1);

namespace App\Security\Domain\Model;

use App\User\Domain\Model\User;
use Carbon\CarbonImmutable;
use Ramsey\Uuid\UuidInterface;

class PasswordRecoveryToken
{
    private string $token;
    private UuidInterface $userUuid;
    private CarbonImmutable $expiresAt;

    public function __construct(
        UuidInterface $userUuid
    )
    {
        $this->token = sha1(uniqid($userUuid->toString(), true));
        $this->userUuid = $userUuid;
        $this->expiresAt = CarbonImmutable::now()->utc()->addDay();
    }

    public function token(): string
    {
        return $this->token;
    }

    public function userUuid(): UuidInterface
    {
        return $this->userUuid;
    }

    public function expiresAt(): CarbonImmutable
    {
        return $this->expiresAt;
    }
}
