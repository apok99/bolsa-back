<?php

namespace App\CoreContext\Season\Infrastructure\Controllers;

use App\CoreContext\Season\Application\Querys\FindActiveSeason;
use App\CoreContext\Season\Application\Querys\FindActiveSeasonHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetSeasonController extends Controller
{

    public function __invoke(Request $request)
    {

       $season = $this->handle(FindActiveSeason::class, FindActiveSeasonHandler::class,  ['active' => true]);

       return response()->json($season);

    }
}
