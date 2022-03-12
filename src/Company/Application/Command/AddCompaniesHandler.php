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
        foreach ($command->companies() as $company)
        {
            $company = new Company(
                $company['symbol'],
                $company['active'] ?? null
            );

            $this->companyRepository->save($company);
        }
    }
}
