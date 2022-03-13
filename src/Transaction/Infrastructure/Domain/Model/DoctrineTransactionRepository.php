<?php

declare(strict_types=1);

namespace App\Transaction\Infrastructure\Domain\Model;

use App\Transaction\Domain\Model\Transaction;
use App\Transaction\Domain\Model\TransactionRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DoctrineTransactionRepository extends ServiceEntityRepository implements TransactionRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Transaction::class);
    }
}