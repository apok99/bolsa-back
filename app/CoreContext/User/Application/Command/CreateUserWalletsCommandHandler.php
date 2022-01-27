<?php

namespace App\CoreContext\User\Application\Command;

use App\CoreContext\User\Domain\Entity\UserRepository;

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
