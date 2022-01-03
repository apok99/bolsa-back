<?php
namespace App\CoreContext\Users\Domain\ModelView;


use App\CoreContext\Users\Domain\Entities\UserWallets;

class UserWalletsFactory
{
    public static function create(UserWallets $wallet)
    {
        return new UserWalletView(
            $wallet->company->name ?? null,
            $wallet->wallet,
            $wallet->company->symbol,
            $wallet->season_wallet
        );
    }

}
