<?php

namespace App\CoreContext\User\Application\Command;

class BuyBusiness
{
    private string $businessId;
    private $user;

    public function __construct(string $businessId, $user)
    {
        $this->businessId = $businessId;
        $this->user = $user;
    }

    public function businessId(): string
    {
        return $this->businessId;
    }

    public function user()
    {
        return $this->user;
    }

}
