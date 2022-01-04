<?php

namespace App\CoreContext\Users\Infrastructure\Controllers;

use App\CoreContext\Companies\Application\Querys\FindAllCompanies;
use App\CoreContext\Companies\Application\Querys\FindAllCompaniesHandler;
use App\CoreContext\Users\Application\Commands\CreateUser;
use App\CoreContext\Users\Application\Commands\CreateUserHandler;
use App\CoreContext\Users\Application\Commands\CreateUserWalletsCommand;
use App\CoreContext\Users\Application\Commands\CreateUserWalletsCommandHandler;
use App\CoreContext\Users\Infrastructure\Actions\CreateUserWalletsAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CreateUserController extends Controller
{
    const USERNAME = 'username';
    const NAME = 'name';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const MONEY = 'money';
    const SEASON_MONEY = 'seasonMoney';
    const WALLETS = 'wallets' ;

    public function __invoke(Request $request)
    {

        $validator = \Validator::make($request->all(), [
            'username' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails())
            return throw new \Exception('Please, check the inputs you have entered.');

        $command = array(
            self::USERNAME => $request->username,
            self::NAME => $request->name,
            self::EMAIL => $request->email,
            self::PASSWORD => Hash::make($request->password, [
                'cost' => 10
            ]),
            self::MONEY => 2000,
            self::SEASON_MONEY => 0,
       );

        $user = $this->handle(CreateUser::class, CreateUserHandler::class, $command);
        $companies = $this->handle(FindAllCompanies::class, FindAllCompaniesHandler::class, []);
        $wallets = CreateUserWalletsAction::execute($user, $companies);


        $createUserWalletsCommand = [
            self::WALLETS => $wallets,
        ];
        $this->handle(CreateUserWalletsCommand::class, CreateUserWalletsCommandHandler::class, $createUserWalletsCommand);

        return response(['created' => true]);
    }
}
