<?php

namespace App\CoreContext\Users\Domain\Entities;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{

    use Notifiable;

    public $fillable = [
        'username',
        "email",
        "money",
        "seasonMoney"
    ];

    public $hidden = [
        'password',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }


}
