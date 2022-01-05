<?php

namespace App\CoreContext\Users\Domain\Entities;

interface UserRepository
{
    public function save(User $user);
    public function byId(int $id);
    public function addToWallet(int $userId, string $symbol, $amount );
    public function findUserWallet(int $userId, string $symbol);
    public function updateWallet(int $userId, string $symbol, float $quantity);
    public function findAllWalletsByUserId(int $userId);
    public function createUserWallets(array $wallets);
    public function findByEmailOrUsername($email, $username);
    public function findAllWalletsWithCreditByUserId($userId);
}

