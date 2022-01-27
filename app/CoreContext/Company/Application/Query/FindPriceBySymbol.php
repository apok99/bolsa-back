<?php
namespace App\CoreContext\Company\Application\Query;

class FindPriceBySymbol
{
    private string $symbol;

    public function __construct(string $symbol)
    {
        $this->symbol = $symbol;
    }

    public function symbol(): string
    {
        return $this->symbol;
    }
}
