<?php

namespace App\CoreContext\Users\Infrastructure\Controllers;

use App\CoreContext\Users\Application\Querys\FindHistoricalUserWorth;
use App\CoreContext\Users\Application\Querys\FindHistoricalUserWorthHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserGetHistoricalWorthsController extends controller
{
    public function __invoke(Request $request)
    {
        $user = auth()->user();

        $findWorths = $this->handle(FindHistoricalUserWorth::class, FindHistoricalUserWorthHandler::class, [
            'user' => $user
        ]);

        return response()->json($findWorths);
    }

}
