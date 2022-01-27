<?php

namespace App\CoreContext\Users\Infrastructure\Controllers;

use App\CoreContext\Users\Application\Querys\FindAllUserBusiness;
use App\CoreContext\Users\Application\Querys\FindAllUserBusinessHandler;
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
