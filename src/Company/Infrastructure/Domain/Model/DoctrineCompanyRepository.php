<?php

declare(strict_types=1);

namespace App\Company\Infrastructure\Domain\Model;

use App\Company\Domain\Model\Company;
use App\Company\Domain\Model\CompanyRepository;
use App\Market\Domain\ValueObject\Market;
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

    public function byId(UuidInterface $id) : ?Company{
        return $this->find($id);
    }

    public function bySymbol(string $symbol): ?Company
    {
        return $this->findOneBy(['symbol' => $symbol]);
    }

    public function byMarket(Market $market): array
    {
        return $this->findBy(['market' => $market->value()]);
    }

    public function bySymbols(array $symbols): array
    {
        return $this->createQueryBuilder('company')
            ->andWhere('company.symbol IN (:symbols)')
            ->setParameter('symbols', $symbols)
            ->getQuery()
            ->getResult();
    }
}
