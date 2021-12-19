<?php

namespace App\CoreContext\Users\Application\Commands;

use App\CoreContext\Users\Domain\Entities\UserRepository;

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

        if ($user->money < $userBuy->cost())
            throw new \Exception("User does not have enought money.");

        $user->money -= $userBuy->cost();

        $amount = $wallet->wallet + ($userBuy->cost() / $userBuy->price());
        $this->userRepository->addToWallet($user->id, $userBuy->symbol(), $amount);
        $this->userRepository->save($user);
    }
}
