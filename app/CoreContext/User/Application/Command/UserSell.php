<?php

namespace App\CoreContext\User\Application\Command;


use App\CoreContext\User\Domain\Entity\User;

class UserSell
{
    private string $symbol;
    private User $user;
    private float $quantity;
    private float $price;

    public function __construct(string $symbol, User $user, float $quantity, float $price)
    {
        $this->symbol = $symbol;
        $this->user = $user;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function symbol(): string
    {
        return $this->symbol;
    }

    public function user(): User
    {
        return $this->user;
    }

    public function quantity(): float
    {
        return $this->quantity;
    }

    public function price(): float
    {
        return $this->price;
    }

}
