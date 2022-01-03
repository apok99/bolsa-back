<?php

namespace App\CoreContext\Users\Application\Commands;

use App\CoreContext\Users\Domain\Entities\User;
use App\CoreContext\Users\Domain\Entities\UserRepository;

class CreateUserHandler
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(CreateUser $user)
    {
        $newUser = new User;
        $newUser->username = $user->username();
        $newUser->name = $user->name();
        $newUser->email = $user->email();
        $newUser->password = $user->password();
        $newUser->money = $user->money();
        $newUser->seasonMoney = $user->seasonMoney();
        $this->userRepository->save($newUser);

        return $newUser;
    }



}
