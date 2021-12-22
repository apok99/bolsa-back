<?php

namespace App\CoreContext\Users\Domain\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWallets extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('\App\CoreContext\Users\Domain\Entities\User', 'id');
    }

    public function company()
    {
        return $this->belongsTo('\App\CoreContext\Companies\Domain\Entities\Company', 'id');
    }
}
