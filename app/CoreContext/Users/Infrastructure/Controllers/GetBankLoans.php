<?php

namespace App\CoreContext\Users\Infrastructure\Controllers;

use App\CoreContext\Users\Application\Querys\FindBankLoans;
use App\CoreContext\Users\Application\Querys\FindBankLoansHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetBankLoans extends Controller
{
    public function __invoke(Request $request)
    {
        return response()->json(
            $this->handle(
                FindBankLoans::class,
                FindBankLoansHandler::class,
                [
                    'datetime' => new \DateTime(),
                ]
            )
        );
    }
}
