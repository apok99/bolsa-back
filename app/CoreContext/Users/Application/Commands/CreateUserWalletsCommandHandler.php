<?php

namespace App\CoreContext\Users\Application\Commands;

use App\CoreContext\Users\Domain\Entities\UserRepository;

class CreateUserWalletsCommandHandler
{

    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(CreateUserWalletsCommand $createUserWalletsCommand)
    {
        $this->userRepository->createUserWallets($createUserWalletsCommand->wallets());

    }

}
