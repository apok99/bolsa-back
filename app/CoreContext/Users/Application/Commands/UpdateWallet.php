<?php

namespace App\CoreContext\Users\Application\Commands;

class UpdateWallet
{

    private string $walletType;
    private float $quantity;
    private string $symbol;
    private $user;

    public function __construct(string $walletType1, float $quantity1, string $symbol1, $user)
    {
        $this->walletType = $walletType1;
        $this->quantity = $quantity1;
        $this->symbol = $symbol1;
        $this->user = $user;
    }

    public function walletType(): string
    {
        return $this->walletType;
    }

    public function quantity(): float
    {
        return $this->quantity;
    }

    public function symbol(): string
    {
        return $this->symbol;
    }

    public function user(){
        return $this->user;
    }

}
