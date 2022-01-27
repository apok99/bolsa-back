<?php

namespace App\CoreContext\Company\Application\Command;

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
