<?php

namespace App\CoreContext\User\Application\Command;

use App\CoreContext\User\Domain\Entity\User;

class UserBuy
{

    private string $symbol;
    private float $price;
    private User $user;
    private float $cost;

    public function __construct(string $symbol, float $price, User $user, float $cost)
    {
        $this->symbol = $symbol;
        $this->price = $price;
        $this->user = $user;
        $this->cost = $cost;
    }

    public function symbol(): string
    {
        return $this->symbol;
    }

    public function price(): float
    {
        return $this->price;
    }

    public function user(): User
    {
        return $this->user;
    }

    public function cost(): float
    {
        return $this->cost;
    }


}
