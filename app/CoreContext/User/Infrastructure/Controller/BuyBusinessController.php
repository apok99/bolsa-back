<?php

namespace App\CoreContext\User\Infrastructure\Controller;

use App\CoreContext\User\Application\Command\BuyBusiness;
use App\CoreContext\User\Application\Command\BuyBusinessHandler;
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
