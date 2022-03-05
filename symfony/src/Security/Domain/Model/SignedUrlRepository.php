<?php
declare(strict_types=1);

namespace App\Security\Domain\Model;

interface SignedUrlRepository
{
    public function save(SignedUrl $signedUrl): void;

    public function delete(SignedUrl $signedUrl): void;

    public function byToken(string $token): ?SignedUrl;
}
