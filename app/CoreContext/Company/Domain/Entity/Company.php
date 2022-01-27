<?php

namespace App\CoreContext\Company\Domain\Entity;

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
