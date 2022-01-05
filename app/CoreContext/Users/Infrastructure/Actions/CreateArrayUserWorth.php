<?php

namespace App\CoreContext\Users\Infrastructure\Actions;

class CreateArrayUserWorth
{
    public static function execute($userWallets, $companies): int
    {
        $worth = 0;
        foreach ($userWallets as $wallet)
        {
            foreach ($companies as $company)
            {
                if ($company->symbol === $wallet->company->symbol){
                    $worth += $company->price * $wallet->wallet;
                }
            }
        }

        return $worth;
    }
}
