<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Domain\Model;

use App\User\Domain\Model\User;
use App\User\Domain\Model\UserRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DoctrineUserRepository extends ServiceEntityRepository implements UserRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function save(User $user): void
    {
        $this->_em->persist($user);
    }

    public function byEmail(string $email): ?User
    {
        return $this->findOneBy(['email.value' => $email]);
    }
}
