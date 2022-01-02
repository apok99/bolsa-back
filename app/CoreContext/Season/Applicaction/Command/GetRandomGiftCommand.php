<?php

namespace App\CoreContext\Season\Applicaction\Command;

class GetRandomGiftCommand
{
    private $user;
    private $companies;

    public function __construct($companies, $user)
    {
        $this->companies = $companies;
        $this->user = $user;
    }

    public function user()
    {
        return $this->user;
    }

    public function companies()
    {
        return $this->companies;
    }

}
