<?php

namespace App\CoreContext\User\Application\Command;

class CreateUser
{
    private string $username;
    private string $name;
    private string $email;
    private string $password;
    private float $money;
    private float $seasonMoney;

    public function __construct(string $username, string $name, string $email, string $password, float $money, float $seasonMoney)
    {
        $this->username = $username;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->money = $money;
        $this->seasonMoney = $seasonMoney;
    }

    public function username(): string
    {
        return $this->username;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function money(): float
    {
        return $this->money;
    }

    public function seasonMoney(): float
    {
        return $this->seasonMoney;
    }

}
