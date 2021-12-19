<?php

namespace App\CoreContext\Users\Application\Querys;

use App\CoreContext\Users\Domain\Entities\UserRepository;

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
