<?php

namespace App\CoreContext\User\Application\Command;

use App\CoreContext\User\Domain\Entity\UserRepository;

class CreateUserDailyWorthHandler
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(CreateUserDailyWorth $command)
    {
        return $this->userRepository->createDailyWorth($command->dailyWorth());
    }
}
