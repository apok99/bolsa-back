<?php

namespace App\CoreContext\User\Application\Query;

use App\CoreContext\User\Domain\Entity\UserRepository;

class FindHistoricalUserWorthHandler
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function handle(FindHistoricalUserWorth $findHistoricalUserWorth)
    {

         return $this->userRepository->findHistoricalUserWorth($findHistoricalUserWorth->user()->id);
    }
}
