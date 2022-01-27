<?php

namespace App\CoreContext\Season\Application\Query;

class FindActiveSeason
{
    private bool $active;

    public function __construct(bool $active)
    {
        $this->active = $active;
    }

    public function active(): bool
    {
        return $this->active;
    }




}
