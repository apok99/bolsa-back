<?php

namespace App\CoreContext\Users\Infrastructure\Actions;

use App\CoreContext\Users\Domain\Entities\User;
use App\CoreContext\Users\Infrastructure\Helpers\ApiHelper;

class CreateUserWalletsAction
{
    public static function execute($user, $companies): array
    {
        $wallets = [];

        foreach ($companies as $company){
            $wallets[] = [
                'user_id' => $user->id,
                'company_id' => $company->id,
                'wallet' => 0,
                'season_wallet' => 0
            ];
        }

        return $wallets;
    }
}
