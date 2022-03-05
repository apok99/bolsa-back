<?php

declare(strict_types=1);

namespace App\Security\Domain\Service;

use App\User\Domain\Model\User;
use DateInterval;

interface UrlSignerInterface
{
    public function setUrl(string $url): self;

    public function setDuration(DateInterval $interval): self;

    public function addDays(int $days): self;

    public function addHours(int $hours): self;

    public function addMinutes(int $minutes): self;

    public function addSeconds(int $seconds): self;

    public function setUserIdentifier(string $userIdentifier): self;

    public function setUses(int $uses): self;

    public function getSignedUrl(): string;

    public function verify(string $url): bool;
}
