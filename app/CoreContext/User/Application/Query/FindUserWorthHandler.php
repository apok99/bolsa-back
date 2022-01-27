<?php

namespace App\CoreContext\User\Application\Query;

use App\CoreContext\User\Domain\Entity\UserRepository;

class FindUserWorthHandler
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(FindUserWorth $findUserWorth)
    {
        $wallets = $this->userRepository->findAllWalletsWithCreditByUserId($findUserWorth->user()->id);
        $string = '';

        foreach ($wallets as $wallet) {
            $string .= $wallet->company->symbol.',';
        }

        return (object) ['string' => $string, 'wallets' => $wallets];
    }

}
