<?php

namespace App\CoreContext\Season\Applicaction\Command;

class   CreateSeasonCommand
{
    private $active;
    private \Datetime $now;

    public function __construct()
    {
        $this->now = new \DateTime();
        $this->active = true;
    }

    public function active()
    {
        return $this->active;
    }

    public function now()
    {
        return $this->now;
    }

}
