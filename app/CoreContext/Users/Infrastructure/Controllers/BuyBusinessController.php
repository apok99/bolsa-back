<?php

namespace App\CoreContext\Users\Infrastructure\Controllers;

use App\CoreContext\Users\Application\Commands\BuyBusiness;
use App\CoreContext\Users\Application\Commands\BuyBusinessHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuyBusinessController extends Controller
{
    public function __invoke(Request $request)
    {
        //falta el validador


        $this->handle(BuyBusiness::class, BuyBusinessHandler::class, [
            'businessId' => $request->businessId,
            'user' => auth()->user()
        ]);
    }
}
