<?php

declare(strict_types=1);

namespace App\Security\Infrastructure\Domain\Model;

use App\Security\Domain\Model\SignedUrl;
use App\Security\Domain\Model\SignedUrlRepository;

class InMemorySignedUrlRepository implements SignedUrlRepository
{

    private array $memory = [];

    public function save(SignedUrl $signedUrl): void
    {
        $this->memory[$signedUrl->token()] = $signedUrl;
    }

    public function delete(SignedUrl $signedUrl): void
    {
        unset($this->memory[$signedUrl->token()]);
    }

    public function byToken(string $token): ?SignedUrl
    {
        return $this->memory[$token] ?? null;
    }
}
