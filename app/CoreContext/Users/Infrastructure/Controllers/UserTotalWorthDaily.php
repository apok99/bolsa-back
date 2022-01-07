<?php

namespace App\CoreContext\Users\Infrastructure\Controllers;

use App\CoreContext\Companies\Application\Querys\FindAllCompanies;
use App\CoreContext\Companies\Application\Querys\FindAllCompaniesHandler;
use App\CoreContext\Users\Application\Commands\CreateUserDailyWorth;
use App\CoreContext\Users\Application\Commands\CreateUserDailyWorthHandler;
use App\CoreContext\Users\Application\Querys\FindAllUsers;
use App\CoreContext\Users\Application\Querys\FindAllUsersHandler;
use App\CoreContext\Users\Infrastructure\Actions\CreateUserDailyWorthArray;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

set_time_limit ( 15000 );

class UserTotalWorthDaily extends Controller
{

    public function __invoke(Request $request)
    {

        $companies = $this->handle(FindAllCompanies::class, FindAllCompaniesHandler::class, []);
        $users = $this->handle(FindAllUsers::class, FindAllUsersHandler::class, ['now' => new \DateTime()]);

        $dailyUsersWorth = CreateUserDailyWorthArray::execute($users, $companies);

        try
        {
            $this->handle(CreateUserDailyWorth::class, CreateUserDailyWorthHandler::class, $dailyUsersWorth);
        }
        catch(\Exception $e)
        {
            throw new \Exception('Oops! Something went wrong.');
        }

        return response()->json(['error' => false]);

    }

}
