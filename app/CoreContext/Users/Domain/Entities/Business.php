<?php

namespace App\CoreContext\Users\Domain\Entities;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $table = 'business';

    public function businessUsers()
    {
        return $this->hasMany('\App\CoreContext\Users\Domain\Entities\User', 'business_id');
    }

}
