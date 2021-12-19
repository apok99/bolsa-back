<?php

namespace App\CoreContext\Users\Infrastructure\Controllers;

use App\CoreContext\Users\Application\Commands\CreateUser;
use App\CoreContext\Users\Application\Commands\CreateUserHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateUserController extends Controller
{
    const USERNAME = 'username';
    const NAME = 'name';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const MONEY = 'money';
    const SEASON_MONEY = 'seasonMoney';

    public function __invoke(Request $request)
    {
        $command = array(
            self::USERNAME => $request->username,
            self::NAME => $request->name,
            self::EMAIL => $request->email,
            self::PASSWORD => $request->password,
            self::MONEY => 100,
            self::SEASON_MONEY => 0,
       );

        $fromBusResponse = $this->handle(CreateUser::class, CreateUserHandler::class, $command);

        return response($fromBusResponse);
    }
}
