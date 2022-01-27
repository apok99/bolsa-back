<?php

namespace App\CoreContext\User\Application\Query;

class FindAllUserBusiness
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
