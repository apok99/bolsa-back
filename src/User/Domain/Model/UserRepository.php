<?php

namespace App\User\Domain\Model;

use Ramsey\Uuid\UuidInterface;

interface UserRepository
{
    public function save(User $user): void;

    public function byUuid(UuidInterface $uuid): ?User;

    public function byEmail(string $email): ?User;

    public function byUsername(string $username): ?User;
}
