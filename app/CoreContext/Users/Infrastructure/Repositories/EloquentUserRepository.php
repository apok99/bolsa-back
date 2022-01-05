<?php

namespace App\CoreContext\Users\Infrastructure\Repositories;

use App\CoreContext\Users\Domain\Entities\User;
use App\CoreContext\Users\Domain\Entities\UserRepository;
use App\CoreContext\Users\Domain\Entities\UserWallets;

class EloquentUserRepository implements UserRepository
{
    public function save(User $user): User
    {
        $user->save();
        return $user;
    }

    public function byId(int $id): User
    {
        return User::find($id);
    }

    public function addToWallet(int $userId, string $symbol, $amount) : void
    {
        User::leftJoin('user_wallets','user_wallets.user_id','=','users.id')
            ->leftJoin('companies', 'companies.id', '=', 'user_wallets.company_id')
            ->where('user_wallets.user_id', $userId)
            ->where('companies.symbol', $symbol)
            ->update(
                [
                    'wallet' => $amount
                ]
            );

    }

    public function updateWallet(int $userId, string $symbol, $amount): void
    {
        User::leftJoin('user_wallets','user_wallets.user_id','=','users.id')
            ->leftJoin('companies', 'companies.id', '=', 'user_wallets.company_id')
            ->where('user_wallets.user_id', $userId)
            ->where('companies.symbol', $symbol)
            ->update(
                [
                    'wallet' => $amount
                ]
            );
    }

    public function findUserWallet(int $userId, string $symbol)
    {
        return User::leftJoin('user_wallets','user_wallets.user_id','=','users.id')
            ->leftJoin('companies', 'companies.id', '=', 'user_wallets.company_id')
            ->where('user_wallets.user_id', $userId)
            ->where('companies.symbol', $symbol)
            ->select('user_wallets.wallet')
            ->first();
    }

    public function findAllWalletsByUserId(int $userId)
    {
        return UserWallets::with(['company', 'user'])->where('user_id', $userId)->orderBy('wallet', 'desc')->get();
    }

    public function createUserWallets(array $wallets)
    {
        return UserWallets::insert($wallets);
    }


    public function resetSeasonWallets()
    {
        return UserWallets::update(['season_wallet' => 0]);
    }

    public function findByEmailOrUsername($email, $username)
    {
        return User::orWhere('email', $email)->orWhere('username', $username)->first();
    }

    public function findAllWalletsWithCreditByUserId($userId)
    {
        return UserWallets::where('user_id', $userId)->where('wallet', '>', 0)->get();
    }
}
