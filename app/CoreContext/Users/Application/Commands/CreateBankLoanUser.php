<?php

namespace App\CoreContext\Users\Application\Commands;

class CreateBankLoanUser
{
    private $user;
    private $loanBankId;

    public function __construct($user, $loadBankId)
    {
        $this->user = $user;
        $this->loanBankId = $loadBankId;
    }

    public function user()
    {
        return $this->user;
    }

    public function loanBankId()
    {
        return $this->loanBankId;
    }


}
