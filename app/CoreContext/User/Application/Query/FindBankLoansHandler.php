<?php

namespace App\CoreContext\User\Application\Query;

use App\CoreContext\User\Application\Query\FindBankLoans;
use App\CoreContext\User\Domain\Entity\UserRepository;

class FindBankLoansHandler
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(FindBankLoans $findBankLoans)
    {
        return $this->userRepository->findLoans();
    }
}
