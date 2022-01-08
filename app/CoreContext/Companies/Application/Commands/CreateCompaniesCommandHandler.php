<?php

namespace App\CoreContext\Companies\Application\Command;

use App\CoreContext\Companies\Domain\Entities\CompanyRepository;

class CreateCompaniesCommandHandler
{
    private CompanyRepository $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }
    public function handle(CreateCompaniesCommand $createCompaniesCommand): void
    {
        $collection = Array();

        foreach($createCompaniesCommand->companies() as $company)
        {
            $collection[] =  ['name' => strtoupper($company->name), 'symbol' => strtoupper($company->symbol)];
        }

        $this->companyRepository->insertByArray($collection);
    }
}
