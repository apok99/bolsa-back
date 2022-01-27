<?php

namespace App\CoreContext\User\Application\Query;

use App\CoreContext\User\Domain\Entity\UserRepository;

class FindAllUsersHandler
{

    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(FindAllUsers $findAllUsers)
    {
        return $this->userRepository->findAll();
    }

}
