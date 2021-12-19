<?php

namespace App\CoreContext\Users\Domain\Entities;

interface UserRepository
{
    public function save(User $user);
    public function byId(int $id);
    public function addToWallet(int $userId, string $symbol, $amount );
    public function findUserWallet(int $userId, string $symbol);
}

