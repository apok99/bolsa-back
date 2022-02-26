<?php

declare(strict_types=1);

namespace App\MarketApi\Domain;

interface MarketApi
{
    public function getSharePrice(string $identifier): int;
    public function getCryptoPrice(string $identifier): int;
    public function getShares(): array;
    public function getCryptos(): array;
}
