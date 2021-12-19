<?php
namespace App\CoreContext\Companies\Application\Querys;

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
