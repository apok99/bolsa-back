<?php

namespace App\CoreContext\User\Infrastructure\Controller;

use App\CoreContext\User\Application\Query\FindAllUserBusiness;
use App\CoreContext\User\Application\Query\FindAllUserBusinessHandler;
use App\Http\Controllers\Controller;

class FindAllUserBusinessController extends Controller
{

    public function __invoke()
    {
        $this->handle(FindAllUserBusiness::class, FindAllUserBusinessHandler::class, [
            'user' => auth()->user()
        ]);
    }
}
