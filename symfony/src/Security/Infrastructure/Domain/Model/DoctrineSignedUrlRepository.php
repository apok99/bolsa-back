<?php
declare(strict_types=1);

namespace App\Security\Infrastructure\Domain\Model;

use App\Security\Domain\Model\SignedUrl;
use App\Security\Domain\Model\SignedUrlRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DoctrineSignedUrlRepository extends ServiceEntityRepository implements SignedUrlRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SignedUrl::class);
    }

    public function save(SignedUrl $signedUrl): void
    {
        $this->_em->persist($signedUrl);
        $this->_em->flush();
    }

    public function delete(SignedUrl $signedUrl): void
    {
        $this->_em->remove($signedUrl);
    }

    public function byToken(string $token): ?SignedUrl
    {
        return $this->findOneBy(['token' => $token]);
    }
}
