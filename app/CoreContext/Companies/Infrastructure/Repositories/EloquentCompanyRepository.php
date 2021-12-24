<?php

namespace App\CoreContext\Companies\Infrastructure\Repositories;

use App\CoreContext\Companies\Domain\Entities\Company;
use App\CoreContext\Companies\Domain\Entities\CompanyRepository;

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
