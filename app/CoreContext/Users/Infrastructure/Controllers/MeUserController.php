<?php

namespace App\CoreContext\Users\Infrastructure\Controllers;

use App\CoreContext\Users\Application\Querys\FindUserById;
use App\CoreContext\Users\Application\Querys\FindUserByIdHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeUserController extends Controller
{
    public function __invoke(Request $request){
        return response(auth()->user()  );
    }
}
