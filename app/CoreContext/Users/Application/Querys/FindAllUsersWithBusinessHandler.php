<?php

namespace App\CoreContext\Users\Application\Querys;

use App\CoreContext\Users\Domain\Entities\UserRepository;

class FindAllUsersWithBusinessHandler
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(FindAllUsersWithBusiness $command)
    {
        return $this->userRepository->findBusinessByIdAndUser($command->business(), $command->user(), $command->now());

    }

}
