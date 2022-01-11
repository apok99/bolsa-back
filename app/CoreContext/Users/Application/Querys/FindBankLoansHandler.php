<?php

namespace App\CoreContext\Users\Application\Querys;

use App\CoreContext\Users\Application\Querys\FindBankLoans;
use App\CoreContext\Users\Domain\Entities\UserRepository;

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
