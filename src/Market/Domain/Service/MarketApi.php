<?php

declare(strict_types=1);

namespace App\Market\Domain\Service;

use App\Company\Domain\Model\Company;

interface MarketApi
{
    /** @param Company[] $companies */
    public function getCompanies(array $companies): array;

    public function getCompanyPrice(Company $company): float;

    public function getCompany(Company $company): array;

    public function getCryptoPrice(string $identifier): float;

    public function getCryptos(array $cryptos): array;

    public function isStockMarketOpen(): bool;

    public function isForexMarketOpen(): bool;
}
