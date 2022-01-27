<?php

namespace App\CoreContext\User\Infrastructure\Action;

use App\CoreContext\User\Infrastructure\Helper\ApiHelper;

class CreateUserDailyWorthArray
{
    public static function execute($users, $companies)
    {
        $companiesInfo = ApiHelper::get('https://financialmodelingprep.com/api/v3/quote/' . StringCommedCompany::execute($companies));

        $arrayInsert = Array();
        $now  = (new \DateTime('now'))->format('Y-m-d 23:55:00');

        foreach ($users as $user)
        {
            $worth = 0;

            foreach ($user->wallets as $wallet)
            {
                if($wallet->wallet == 0){
                    continue;
                }

                $companyPrice = array_filter($companiesInfo, function($company) use ($wallet)
                {
                    if ($wallet->company->symbol == $company->symbol)
                    {
                        return $company;
                    }
                });

                $companyPrice = $companyPrice[array_keys($companyPrice)[0]]->price ?? 0;

                $worth += ($wallet->wallet * $companyPrice);
            }

            if($worth > 0)
                $arrayInsert[] = ['user_id' => $user->id, 'worth' => $worth + $user->money, 'date' => $now];

        }

        return $arrayInsert;

    }
}
