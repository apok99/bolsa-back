<?php

namespace App\CoreContext\User\Application\Query;

use App\CoreContext\User\Domain\Entity\UserRepository;

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
