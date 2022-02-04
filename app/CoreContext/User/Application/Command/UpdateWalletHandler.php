<?php

namespace App\CoreContext\User\Application\Command;

use App\CoreContext\User\Domain\Entity\UserRepository;

class UpdateWalletHandler
{
    private UserRepository $userRepository;

    public function handle(UpdateWallet $updateWallet)
    {
        //$this->userRepository->addToTypeWallet($updateWallet->user()->id, $updateWallet->symbol(), $updateWallet->quantity(), $updateWallet->)
    }
}
