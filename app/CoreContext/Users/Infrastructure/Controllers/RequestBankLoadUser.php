<?php

namespace App\CoreContext\Users\Infrastructure\Controllers;

use App\CoreContext\Users\Application\Commands\CreateBankLoanUser;
use App\CoreContext\Users\Application\Commands\CreateBankLoanUserHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestBankLoadUser extends Controller
{
    public function __invoke(Request $request)
    {
        $user = auth()->user();

        $this->handle(CreateBankLoanUser::class, CreateBankLoanUserHandler::class, [
            'user' => $user,
            'loadBankId' => $request->loadBankId
        ]);

        return response()->json(true);
    }

}
