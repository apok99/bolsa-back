<?php

namespace App\CoreContext\User\Application\Command;

use App\CoreContext\User\Domain\Entity\UserRepository;

class UserBuyHandler
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(UserBuy $userBuy){

        $user = $this->userRepository->byId($userBuy->user()->id);
        $wallet = $this->userRepository->findUserWallet($userBuy->user()->id, $userBuy->symbol());
        //Deuda tecnica cambiar a Excepcion en otro archivo.

        if (!$wallet)
            throw new \Exception("Wallet not found");

        if ($user->money < $userBuy->cost())
            throw new \Exception("User does not have enough money.");

        $user->money -= $userBuy->cost();
        $amount = $wallet->wallet + ($userBuy->cost() / $userBuy->price());

        $this->userRepository->addToWallet($user->id, $userBuy->symbol(), $amount);
        $this->userRepository->save($user);
    }
}
