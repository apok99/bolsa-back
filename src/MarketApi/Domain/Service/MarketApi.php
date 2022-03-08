<?php

declare(strict_types=1);

namespace App\MarketApi\Domain\Service;

use App\Company\Domain\Model\Company;

interface MarketApi
{
    /** @param Company[] $companies */
    public function getCompanies(array $companies): array;
    public function getCompanyPrice(string $identifier): array;
    public function getCompany(string $identifier): array;
    public function getCryptoPrice(string $identifier): array;
    public function getCryptos(array $cryptos): array;
}
