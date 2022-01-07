<?php

namespace App\CoreContext\Users\Infrastructure\Controllers;

use App\CoreContext\Users\Application\Querys\FindBestWorthDailyUsers;
use App\CoreContext\Users\Application\Querys\FindBestWorthDailyUsersHandler;
use App\Http\Controllers\Controller;

class GetBestWorthDailyController extends Controller
{

    public function __invoke()
    {
        $bestWorth = $this->handle(FindBestWorthDailyUsers::class,FindBestWorthDailyUsersHandler::class, ['date' => (new \DateTime('Yesterday'))->format('Y-m-d 00:00:00')]);

        return response()->json($bestWorth);

    }

}
