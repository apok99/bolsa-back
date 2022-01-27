<?php

namespace App\CoreContext\User\Application\Query;

use App\CoreContext\User\Domain\Entity\UserRepository;
use App\CoreContext\User\Domain\ModelView\UserWalletsFactory;

class FindUserWalletsHandler
{

    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(FindUserWallets $findUserWallets){

        $wallets = $this->userRepository->findAllWalletsByUserId($findUserWallets->user()->id);

        $collection = Array();

        foreach ($wallets as $wallet)
        {
            $collection[] = UserWalletsFactory::create($wallet);
        }

        return $collection;
    }
}
