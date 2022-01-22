<?php

namespace App\CoreContext\Users\Domain\Entities;

use Illuminate\Database\Eloquent\Model;

class BusinessUsers extends Model
{
    public function user()
    {
        return $this->belongsTo('\App\CoreContext\Users\Domain\Entities\User', 'user_id');
    }

    public function business()
    {
        return $this->belongsTo('\App\CoreContext\Users\Domain\Entities\Business', 'business_id');
    }
}
