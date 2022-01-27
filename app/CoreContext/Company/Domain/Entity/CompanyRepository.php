<?php

namespace App\CoreContext\Company\Domain\Entity;

interface CompanyRepository
{
    public function insertByArray(Array $companies);

    public function getAll();
}
