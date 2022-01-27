<?php
namespace App\CoreContext\User\Domain\ModelView;


use App\CoreContext\User\Domain\Entity\UserWallets;

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
