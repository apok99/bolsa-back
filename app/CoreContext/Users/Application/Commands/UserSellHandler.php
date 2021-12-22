<?php

namespace App\CoreContext\Users\Application\Commands;

use App\CoreContext\Users\Domain\Entities\UserRepository;

class UserSellHandler
{

    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(UserSell $query){

        $wallet = $this->userRepository->findUserWallet($query->user()->id, $query->symbol());
        $user = $this->userRepository->byId($query->user()->id);

        if ($wallet->wallet < $query->quantity())
            throw new \Exception("User does not have enough stock.");

        $wallet->wallet -= $query->quantity();

        $user->money = $user->money + ($query->quantity() * $query->price());

        $this->userRepository->updateWallet($user->id, $query->symbol(), $wallet->wallet);
        $this->userRepository->save($user);

    }

}
