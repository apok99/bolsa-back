<?php

namespace App\CoreContext\User\Application\Query;

use App\CoreContext\User\Domain\Entity\UserRepository;

class FindUserByIdHandler
{

    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(FindUserById $FindUserById)
    {

        $user = $this->userRepository->byId($FindUserById->id());

    }

}
