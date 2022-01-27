<?php

namespace App\CoreContext\User\Application\Query;

use App\CoreContext\User\Domain\Entity\User;

class FindUserWallets
{

    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function user(): User
    {
        return $this->user;
    }

}
