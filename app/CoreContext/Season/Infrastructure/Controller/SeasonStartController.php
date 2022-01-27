<?php

namespace App\CoreContext\Season\Infrastructure\Controller;

use App\CoreContext\Season\Applicaction\Command\CreateSeasonCommand;
use App\CoreContext\Season\Applicaction\Command\CreateSeasonCommandHandler;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Request;

class SeasonStartController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->password !== "W1208389123DNASJKHKJSAHDKAHID2312HKSDJKAsjdhjas_:KJDSASHJDKHJS"){
            return new \Exception("Access denied.");
        }

        $this->handle(CreateSeasonCommand::class, CreateSeasonCommandHandler::class, []);

        return response()->json(['created' => true]);

    }

}
