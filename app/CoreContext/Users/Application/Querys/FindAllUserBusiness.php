<?php

namespace App\CoreContext\Users\Application\Querys;

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
