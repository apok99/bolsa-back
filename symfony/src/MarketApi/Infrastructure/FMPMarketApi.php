<?php

declare(strict_types=1);

namespace App\MarketApi\Infrastructure;

use App\MarketApi\Domain\MarketApi;

class FMPMarketApi implements MarketApi
{
    public function getSharePrice(string $identifier): int
    {
        // TODO: Implement getSharePrice() method.
        return 0;
    }

    public function getCryptoPrice(string $identifier): int
    {
        // TODO: Implement getCryptoPrice() method.
        return 0;
    }

    public function getShares(): array
    {
        // TODO: Implement getShares() method.
        return [];
    }

    public function getCryptos(): array
    {
        // TODO: Implement getCryptos() method.
        return [];
    }
}
