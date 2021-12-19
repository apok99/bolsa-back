<?php

namespace App\CoreContext\Users\Infrastructure\Controllers;

use App\CoreContext\Users\Application\Querys\FindUserById;
use App\CoreContext\Users\Application\Querys\FindUserByIdHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeUserController extends Controller
{
    const ID = 'id';

    public function __invoke(Request $request){

        $query = array(
            self::ID => $request->id,
        );

        $fromBusResponse = $this->handle(FindUserById::class, FindUserByIdHandler::class, $query);
        return response($fromBusResponse);

    }
}
