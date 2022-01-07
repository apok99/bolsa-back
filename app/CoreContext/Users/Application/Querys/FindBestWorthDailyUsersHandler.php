<?php

namespace App\CoreContext\Users\Application\Querys;

use App\CoreContext\Users\Domain\Entities\UserRepository;

class FindBestWorthDailyUsersHandler
{

    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function handle(FindBestWorthDailyUsers $findBestWorthDailyUsers){

        $bestWorths = $this->userRepository->findBestWorthDailyUsersyDate($findBestWorthDailyUsers->dateTime());
        $collection = Array();

        $i = 1;

        foreach($bestWorths as $worth)
        {
            $collection[] = ['i' => $i, 'name' => $worth->user->name, 'username' => $worth->user->username, 'worth' => $worth->worth];
            $i++;
        }

        return $collection;

    }
}
