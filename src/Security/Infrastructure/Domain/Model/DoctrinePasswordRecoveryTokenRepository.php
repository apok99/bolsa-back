<?php
declare(strict_types=1);

namespace App\Security\Infrastructure\Domain\Model;

use App\Security\Domain\Model\PasswordRecoveryToken;
use App\Security\Domain\Model\PasswordRecoveryTokenRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DoctrinePasswordRecoveryTokenRepository extends ServiceEntityRepository implements PasswordRecoveryTokenRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PasswordRecoveryToken::class);
    }

    public function save(PasswordRecoveryToken $passwordRecoveryToken): void
    {
        $this->_em->persist($passwordRecoveryToken);
    }

    public function delete(PasswordRecoveryToken $passwordRecoveryToken): void
    {
        $this->_em->remove($passwordRecoveryToken);
    }

    public function byToken(string $token): ?PasswordRecoveryToken
    {
        return $this->findOneBy(['token' => $token]);
    }
}
