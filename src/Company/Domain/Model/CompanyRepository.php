<?php

declare(strict_types=1);

namespace App\Company\Domain\Model;

use Ramsey\Uuid\UuidInterface;

interface CompanyRepository
{
    public function save(Company $company): void;
    public function getAllActive(): array;
    public function byUuid(UuidInterface $uuid): ?Company;
    public function bySymbol(string $symbol): ?Company;
    public function bySymbols(array $symbols): array;
}
