<?php

namespace App\CoreContext\Users\Application\Commands;

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
