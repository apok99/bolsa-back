<?php

namespace App\CoreContext\Users\Application\Commands;

use App\CoreContext\Users\Domain\Entities\UserRepository;

class UpdateWalletHandler
{
    private UserRepository $userRepository;

    public function handle(UpdateWallet $updateWallet)
    {
        $this->userRepository->addToTypeWallet($updateWallet->user()->id, $updateWallet->symbol(), $updateWallet->quantity(), $updateWallet->)
    }
}
