<?php

declare(strict_types=1);

namespace App\Company\Domain\Model;

use App\Market\Domain\ValueObject\Market;
use Ramsey\Uuid\UuidInterface;

interface CompanyRepository
{
    public function save(Company $company): void;

    public function getAllActive(): array;

    public function byId(UuidInterface $id): ?Company;

    public function bySymbol(string $symbol): ?Company;

    public function byMarket(Market $market): array;

    public function bySymbols(array $symbols): array;
}
