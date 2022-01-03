<?php

namespace App\CoreContext\Companies\Application\Querys;

use App\CoreContext\Companies\Domain\Entities\CompanyRepository;

class FindAllCompaniesHandler
{
    private CompanyRepository $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function handle()
    {
        $companies = $this->companyRepository->getAll();

        return $companies;

    }
}
