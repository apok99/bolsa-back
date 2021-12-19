<?php

namespace App\CoreContext\Users\Infrastructure\Repositories;

use App\CoreContext\Users\Domain\Entities\User;
use App\CoreContext\Users\Domain\Entities\UserRepository;

class EloquentUserRepository implements UserRepository
{
    public function save(User $user): User
    {
        $user->save();
        return $user;
    }

    public function byId(int $id): User
    {
        return User::find($id);
    }
}
