<?php

namespace App\CoreContext\Users\Application\Querys;

class FindAllBusiness
{
        private string $now;

        public function __construct(string $now)
        {
            $this->now  = $now;
        }
}
