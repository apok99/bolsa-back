<?php

namespace App\CoreContext\Users\Infrastructure\Repositories;

use App\CoreContext\Users\Domain\Entities\User;
use App\CoreContext\Users\Domain\Entities\UserRepository;

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

    public function addToWallet(int $userId, string $symbol, $amount)
    {
        User::leftJoin('userWallets','userWallets.user_id','=','users.id')
            ->leftJoin('companies', 'companies.id', '=', 'userWallets.company_id')
            ->where('userWallets.user_id', $userId)
            ->where('companies.symbol', $symbol)
            ->update(
                [
                    'wallet' => $amount
                ]
            );

    }

    public function findUserWallet(int $userId, string $symbol){
        return User::leftJoin('userWallets','userWallets.user_id','=','users.id')
            ->leftJoin('companies', 'companies.id', '=', 'userWallets.company_id')
            ->where('userWallets.user_id', $userId)
            ->where('companies.symbol', $symbol)
            ->select('userWallets.wallet')
            ->first();
    }
}
