<?php

namespace App\CoreContext\User\Application\Query;

class FindAllUsers
{
    private $now;

    public function __construct($now)
    {
        $this->now = $now;
    }

    public function now(): string
    {
        return $this->now;
    }

}
