<?php

namespace App\CoreContext\User\Application\Command;

class PaidBankLoad
{
    private $now;

    public function __construct($now)
    {
        $this->now = $now;
    }

    public function now()
    {
        return $this->now;
    }

}
