<?php

namespace App\CoreContext\Users\Application\Querys;

use App\CoreContext\Users\Domain\Entities\UserRepository;

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
