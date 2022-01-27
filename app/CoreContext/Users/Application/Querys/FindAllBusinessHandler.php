<?php

namespace App\CoreContext\Users\Application\Querys;

use App\CoreContext\Users\Domain\Entities\UserRepository;

class FindAllBusinessHandler
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(FindAllBusiness $business)
    {
        return $this->userRepository->findAllBusiness();
    }
}
