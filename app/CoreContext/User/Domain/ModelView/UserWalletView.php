<?php

namespace App\CoreContext\User\Domain\ModelView;

use App\CoreContext\Company\Domain\Entity\Company;

class UserWalletView
{
    public string $company;
    public float $wallet;

    public function __construct(string $company, float $wallet, string $symbol, float $seasonWallet)
    {
        $this->company = $company;
        $this->wallet = $wallet;
        $this->seasonWallet = $seasonWallet;
        $this->symbol = $symbol;
    }

}
