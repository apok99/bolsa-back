<?php

namespace App\CoreContext\User\Application\Command;

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
