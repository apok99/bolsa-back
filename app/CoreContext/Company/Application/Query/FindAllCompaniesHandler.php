<?php

namespace App\CoreContext\Company\Application\Query;

use App\CoreContext\Company\Domain\Entity\CompanyRepository;

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
