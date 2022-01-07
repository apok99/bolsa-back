<?php

namespace App\CoreContext\Users\Application\Querys;

class FindBestWorthDailyUsers
{
    private string $dateTime;

    public function __construct(string $date)
    {
        $this->dateTime = $date;
    }

    public function dateTime(): string
    {
        return $this->dateTime;
    }

}
