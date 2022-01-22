<?php

namespace App\CoreContext\Users\Application\Commands;

class UpdateUserBusinessBenefit
{
    private $user;
    private $business;

    public function __construct($user, $business)
    {
        $this->user = $user;
        $this->business = $business;
    }

    public function user()
    {
        return $this->user;
    }

    public function business()
    {
        return $this->business;
    }

}
