<?php

namespace App\CoreContext\User\Infrastructure\Controller;

use App\CoreContext\User\Application\Query\FindAllBusiness;
use App\CoreContext\User\Application\Query\FindAllBusinessHandler;
use App\Http\Controllers\Controller;
use Cache;

class GetAllBusinessController extends Controller
{
    public function __invoke()
    {

        if (!Cache::has('business'))
        {
            $business = $this->handle(FindAllBusiness::class, FindAllBusinessHandler::class , [
                'now' => (new \Datetime('now', new \DateTimeZone('Europe/Madrid')))->format('Y-m-d H:i:s')
            ]);

            Cache::put('business', $business, 300);

            return response()->json($business);
        }

        return response()->json(Cache::get('business'));
    }
}
