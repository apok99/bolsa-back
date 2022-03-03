<?php

namespace App\User\Domain\Model;

interface UserRepository
{
    public function save(User $user): void;

    public function byEmail(string $email): ?User;

    public function byUsername(string $username): ?User;
}
