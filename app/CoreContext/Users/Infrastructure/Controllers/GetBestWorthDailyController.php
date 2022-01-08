<?php

namespace App\CoreContext\Users\Infrastructure\Controllers;

use App\CoreContext\Users\Application\Querys\FindBestWorthDailyUsers;
use App\CoreContext\Users\Application\Querys\FindBestWorthDailyUsersHandler;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class GetBestWorthDailyController extends Controller
{

    public function __invoke()
    {

        if(Cache::has('dailyBestWorth')){
            $bestWorth = Cache::get('dailyBestWorth');
        }else{

            $bestWorth = $this->handle(FindBestWorthDailyUsers::class,FindBestWorthDailyUsersHandler::class, ['date' => (new \DateTime('Yesterday'))->format('Y-m-d 00:00:00')]);

            if (sizeof($bestWorth)){
                Cache::put('dailyBestWorth', $bestWorth, Carbon::now()->endOfDay()->addSecond());
            }

        }

        return response()->json($bestWorth);

    }

}
