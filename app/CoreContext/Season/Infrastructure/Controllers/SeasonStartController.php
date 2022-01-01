<?php

namespace App\CoreContext\Season\Infrastructure\Controllers;

use Symfony\Component\HttpFoundation\Request;

class SeasonStartController
{
    public function __invoke(Request $request)
    {
        if ($request->password !== "W1208389123DNASJKHKJSAHDKAHID2312HKSDJKAsjdhjas_:KJDSASHJDKHJS"){
            return new \Exception("Access denied.");
        }


    }

}
