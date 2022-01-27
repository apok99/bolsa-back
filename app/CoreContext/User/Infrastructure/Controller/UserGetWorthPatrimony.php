<?php

namespace App\CoreContext\User\Infrastructure\Controller;

use App\CoreContext\User\Application\Query\FindUserWorth;
use App\CoreContext\User\Application\Query\FindUserWorthHandler;
use App\CoreContext\User\Infrastructure\Action\CreateArrayUserWorth;
use App\CoreContext\User\Infrastructure\Helper\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserGetWorthPatrimony extends Controller
{

        public function __invoke(Request $request)
        {
            $user = auth()->user();

            $userWorth = $this->handle(FindUserWorth::class, FindUserWorthHandler::class, [
                'user' => $user
            ]);


            $companies = ApiHelper::get('https://financialmodelingprep.com/api/v3/quote/'.$userWorth->string);
            $response = CreateArrayUserWorth::execute($userWorth->wallets, $companies);

            $command = [
                'user' => $user,
                'worth' => $response
            ];

            return response()->json(['worth' => $response]);
        }

}
