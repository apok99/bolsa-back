<?php

namespace App\CoreContext\Users\Domain\Entities;

use Illuminate\Database\Eloquent\Model;

class BankLoanUsers extends Model
{
    public function user()
    {
        return $this->belongsTo('\App\CoreContext\Users\Domain\Entities\User', 'user_id');
    }

    public function loan()
    {
        return $this->belongsTo('\App\CoreContext\Users\Domain\Entities\BankLoan', 'loan_id');
    }
}
