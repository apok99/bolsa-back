<?php

namespace App\CoreContext\User\Infrastructure\Controller;

use App\CoreContext\Company\Application\Query\FindAllCompanies;
use App\CoreContext\Company\Application\Query\FindAllCompaniesHandler;
use App\CoreContext\User\Application\Command\CreateUserDailyWorth;
use App\CoreContext\User\Application\Command\CreateUserDailyWorthHandler;
use App\CoreContext\User\Application\Query\FindAllUsers;
use App\CoreContext\User\Application\Query\FindAllUsersHandler;
use App\CoreContext\User\Infrastructure\Action\CreateUserDailyWorthArray;
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
