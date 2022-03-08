<?php
declare(strict_types=1);

namespace App\Security\Domain\Model;

interface PasswordRecoveryTokenRepository
{
    public function save(PasswordRecoveryToken $passwordRecoveryToken): void;

    public function delete(PasswordRecoveryToken $passwordRecoveryToken): void;

    public function byToken(string $token): ?PasswordRecoveryToken;
}
