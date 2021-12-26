<?php

namespace App\CoreContext\Users\Domain\ModelView;

use App\CoreContext\Companies\Domain\Entities\Company;

class UserWalletView
{
    public string $company;
    public float $wallet;

    public function __construct(string $company, float $wallet, string $symbol)
    {
        $this->company = $company;
        $this->wallet = $wallet;
        $this->symbol = $symbol;
    }

}
