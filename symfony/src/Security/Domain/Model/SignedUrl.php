<?php

declare(strict_types=1);

namespace App\Security\Domain\Model;

use Carbon\CarbonImmutable;

class SignedUrl
{
    public function __construct(
        private string $token,
        private string $url,
        private ?string $userIdentifier,
        private ?CarbonImmutable $expiresAt,
        private ?int $uses
    )
    {
    }

    public function token(): string
    {
        return $this->token;
    }

    public function url(): string
    {
        return $this->url;
    }

    public function userIdentifier(): ?string
    {
        return $this->userIdentifier;
    }

    public function expiresAt(): ?CarbonImmutable
    {
        return $this->expiresAt;
    }

    public function uses(): ?int
    {
        return $this->uses;
    }

    public function decreaseUses(): void
    {
        --$this->uses;
    }

}
