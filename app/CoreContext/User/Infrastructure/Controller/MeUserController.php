<?php

namespace App\CoreContext\User\Infrastructure\Controller;

use App\CoreContext\User\Application\Query\FindUserById;
use App\CoreContext\User\Application\Query\FindUserByIdHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeUserController extends Controller
{
    public function __invoke(Request $request){
        return response(auth()->user());
    }
}
