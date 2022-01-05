<?php

namespace App\CoreContext\Users\Infrastructure\Controllers;

use App\CoreContext\Users\Application\Querys\FindUserWorth;
use App\CoreContext\Users\Application\Querys\FindUserWorthHandler;
use App\CoreContext\Users\Infrastructure\Actions\CreateArrayUserWorth;
use App\CoreContext\Users\Infrastructure\Helpers\ApiHelper;
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

            return response()->json(['worth' => $response]);
        }

}
