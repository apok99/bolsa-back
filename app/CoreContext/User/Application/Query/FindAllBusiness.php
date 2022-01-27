<?php

namespace App\CoreContext\User\Application\Query;

class FindAllBusiness
{
        private string $now;

        public function __construct(string $now)
        {
            $this->now  = $now;
        }
}
