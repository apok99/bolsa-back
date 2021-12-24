<?php

namespace App\CoreContext\Users\Application\Commands;

class CreateUserWalletsCommand
{

    private $wallets;

    public function __construct($wallets)
    {

        $this->wallets = $wallets;
    }

    public function wallets()
    {
        return $this->wallets;
    }
}
