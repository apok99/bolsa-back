<?php

namespace App\CoreContext\Companies\Domain\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function wallets()
    {
        return $this->hasMany('\App\CoreContext\Users\Domain\Entities\Company', 'company_id');
    }
}
