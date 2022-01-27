<?php

namespace App\CoreContext\User\Application\Query;


class FindUserWorth
{

    private $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function user()
    {
        return $this->user;
    }

}
