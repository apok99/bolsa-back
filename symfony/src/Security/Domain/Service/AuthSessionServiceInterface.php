<?php

namespace App\Security\Domain\Service;

use App\User\Domain\Model\User;

interface AuthSessionServiceInterface
{
    public function user(): User;
}
