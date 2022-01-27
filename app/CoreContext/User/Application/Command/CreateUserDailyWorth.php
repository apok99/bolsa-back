<?php

namespace App\CoreContext\User\Application\Command;

class CreateUserDailyWorth
{

    private array $dailyWorth;

    public function __construct(array $dailyWorth)
    {
        $this->dailyWorth = $dailyWorth;
    }

    public function dailyWorth(): array
    {
        return $this->dailyWorth;
    }

}
