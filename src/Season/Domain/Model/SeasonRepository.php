<?php
declare(strict_types=1);

namespace App\Season\Domain\Model;

use Ramsey\Uuid\UuidInterface;

interface SeasonRepository
{
    public function save(Season $season): void;
    public function find(UuidInterface $id): ?Season;
    public function findOrFail(UuidInterface $id): Season;
}
