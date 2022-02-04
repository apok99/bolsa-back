<?php

namespace App\CoreContext\User\Infrastructure\Controller;

use App\CoreContext\User\Application\Query\FindBestWorthDailyUsers;
use App\CoreContext\User\Application\Query\FindBestWorthDailyUsersHandler;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class GetBestWorthDailyController extends Controller
{

    public function __invoke()
    {

        if(Cache::has('dailyBestWorth')){
            $bestWorth = Cache::get('dailyBestWorth');
        }else{

            $bestWorth = $this->handle(FindBestWorthDailyUsers::class,FindBestWorthDailyUsersHandler::class, ['date' => (new \DateTime('Yesterday', new \DateTimeZone('Europe/Madrid')))->format('Y-m-d 23:55:00')]);

            if (count($bestWorth)){
               /* Cache::put('dailyBestWorth', $bestWorth, Carbon::now()->endOfDay()->addSecond());*/
                Cache::put('dailyBestWorth', $bestWorth, '300');
            }

        }

        return response()->json($bestWorth);

    }

}
