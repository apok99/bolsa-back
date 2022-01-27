<?php

namespace App\CoreContext\User\Application\Query;

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
