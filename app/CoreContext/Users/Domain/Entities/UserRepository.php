<?php

namespace App\CoreContext\Users\Domain\Entities;

interface UserRepository
{
    public function save(User $user);
    public function byId(int $id);
}
