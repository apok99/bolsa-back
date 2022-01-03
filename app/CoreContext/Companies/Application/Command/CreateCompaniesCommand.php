<?php

namespace App\CoreContext\Companies\Application\Command;

class CreateCompaniesCommand
{

    private $companies;

    public function __construct($companies)
    {
        $this->companies = $companies;
    }

    public function companies(): array
    {
        return $this->companies;
    }
}
