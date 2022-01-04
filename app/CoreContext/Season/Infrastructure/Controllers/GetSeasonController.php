<?php

namespace App\CoreContext\Season\Infrastructure\Controllers;

use App\CoreContext\Season\Applicaction\Query\FindActiveSeason;
use App\CoreContext\Season\Application\Query\FindActiveSeasonHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetSeasonController extends Controller
{

    public function __invoke(Request $request)
    {
        $this->handle(FindActiveSeason::class, FindActiveSeasonHandler::class, []);

    }
}
