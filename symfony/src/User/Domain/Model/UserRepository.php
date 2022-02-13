<?php

namespace App\User\Domain\Model;

interface UserRepository
{
    public function save(User $user): void;

    public function byEmail(string $email): ?User;
}
