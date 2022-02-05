<?php

namespace App\User\Domain\Model;

interface UserRepository
{
    public function byEmail(string $email): ?User;
}
