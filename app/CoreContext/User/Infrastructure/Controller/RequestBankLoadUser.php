<?php

namespace App\CoreContext\User\Infrastructure\Controller;

use App\CoreContext\User\Application\Command\CreateBankLoanUser;
use App\CoreContext\User\Application\Command\CreateBankLoanUserHandler;
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
