<?php

namespace App\CoreContext\Users\Application\Commands;

use App\CoreContext\Users\Domain\Entities\UserRepository;

class BuyBusinessHandler
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(BuyBusiness $buyBusiness)
    {

        $user = $this->userRepository->byId($buyBusiness->user()->id);

        $userAlreadyOwns = $this->userRepository->userHasBusiness($user->id, $buyBusiness->businessId());

        if ($userAlreadyOwns) {
            throw new \Exception('User already owns this business.');
        }

        $business = $this->userRepository->findBusiness($buyBusiness->businessId());
        $this->userRepository->buyBusiness($buyBusiness->businessId(), $user->id);

        $user->money -= $business->price;
        $this->userRepository->save($user);

    }
}
