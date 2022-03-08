<?php

declare(strict_types=1);

namespace App\Company\Infrastructure\Domain\Model;

use App\Company\Domain\Model\Company;
use App\Company\Domain\Model\CompanyRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Ramsey\Uuid\UuidInterface;

class DoctrineCompanyRepository extends ServiceEntityRepository implements CompanyRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Company::class);
    }

    public function save(Company $company): void
    {
        $this->_em->persist($company);
    }

    public function getAllActive(): array
    {
        return $this->findBy(['active' => true, 'deletedAt' => null]);
    }

    public function byUuid(UuidInterface $uuid) : ?Company{
        return $this->find($uuid);
    }

    public function bySymbol(string $symbol): ?Company
    {
        return $this->findOneBy(['symbol' => $symbol]);
    }
}
