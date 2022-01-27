<?php

namespace App\CoreContext\User\Infrastructure\Controller;

use App\CoreContext\User\Application\Query\FindHistoricalUserWorth;
use App\CoreContext\User\Application\Query\FindHistoricalUserWorthHandler;
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
