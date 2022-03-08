<?php

declare(strict_types=1);

namespace App\Company\Application\Command;

use App\Company\Domain\Model\Company;
use App\Company\Domain\Model\CompanyRepository;
use App\CQRS\Application\Command\CommandHandler;

class AddCompaniesHandler implements CommandHandler
{
    public function __construct(
        private CompanyRepository $companyRepository
    )
    {
    }

    public function __invoke(AddCompanies $command)
    {
        foreach ($command->symbols() as $symbol)
        {
            // TODO: Add Collection constraint to AddCompaniesValidator to get
            //  [ symbol, active ] for each company and pass it to the constructor
            $company = new Company($symbol);

            $this->companyRepository->save($company);
        }
    }
}
