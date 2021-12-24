<?php

namespace App\CoreContext\Companies\Domain\Entities;

interface CompanyRepository
{
    public function insertByArray(Array $companies);

    public function getAll();
}
