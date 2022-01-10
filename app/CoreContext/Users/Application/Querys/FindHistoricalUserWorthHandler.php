<?php

namespace App\CoreContext\Users\Application\Querys;

use App\CoreContext\Users\Domain\Entities\UserRepository;

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
