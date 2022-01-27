<?php

namespace App\CoreContext\Company\Infrastructure\Repository;

use App\CoreContext\Company\Domain\Entity\Company;
use App\CoreContext\Company\Domain\Entity\CompanyRepository;

class EloquentCompanyRepository implements CompanyRepository
{
    public function insertByArray(array $companies): void
    {
        Company::insert($companies);
    }

    public function getAll(){
        return Company::get();
    }
}
