<?php

namespace App\CoreContext\User\Domain\Entity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyUserWorth extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('\App\CoreContext\Users\Domain\Entities\User', 'user_id');
    }

}
