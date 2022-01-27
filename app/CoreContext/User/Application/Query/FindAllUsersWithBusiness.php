<?php

namespace App\CoreContext\User\Application\Query;

class FindAllUsersWithBusiness
{
    private string $now;
    private string $business;
    private $user;

    public function __construct(string $now, string $business, $user)
    {
        $this->business = $business;
        $this->now = $now;
        $this->user = $user;
    }

    public function now(): string
    {
        return $this->now;
    }

    public function business()
    {
        return $this->business;
    }

    public function user()
    {
        return $this->user;
    }

}
