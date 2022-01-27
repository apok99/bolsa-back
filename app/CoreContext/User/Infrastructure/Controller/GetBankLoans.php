<?php

namespace App\CoreContext\User\Infrastructure\Controller;

use App\CoreContext\User\Application\Query\FindBankLoans;
use App\CoreContext\User\Application\Query\FindBankLoansHandler;
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
