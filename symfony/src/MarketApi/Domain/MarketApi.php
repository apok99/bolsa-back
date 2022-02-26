<?php

declare(strict_types=1);

namespace App\MarketApi\Domain;

interface MarketApi
{
    public function getCompanies(): array;
    public function getCompanyPrice(string $identifier): int;
    public function getCompany(string $identifier): array;
    public function getCryptoPrice(string $identifier): int;
    public function getCryptos(): array;
}
