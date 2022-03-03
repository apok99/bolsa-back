<?php
declare(strict_types=1);

namespace App\Season\Domain\Model;

use Ramsey\Uuid\UuidInterface;

interface SeasonTemplateRepository
{
    public function save(SeasonTemplate $seasonTemplate): void;
    public function find(UuidInterface $uuid): ?SeasonTemplate;
    public function findOrFail(UuidInterface $uuid): SeasonTemplate;
}
