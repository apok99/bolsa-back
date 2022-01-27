<?php

namespace App\CoreContext\Season\Infrastructure\Controller;

use App\CoreContext\Season\Application\Query\FindActiveSeason;
use App\CoreContext\Season\Application\Query\FindActiveSeasonHandler;
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
