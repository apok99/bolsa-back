<?php

declare(strict_types=1);

namespace App\Security\Application\Service;

use App\Security\Domain\PasswordEncoderInterface;

class PasswordEncoder implements PasswordEncoderInterface
{

    public function hash(string $plainPassword): string
    {
        return password_hash($plainPassword, PASSWORD_BCRYPT);
    }

    public function validate(string $plainPassword, string $hashedPassword): bool
    {
        return password_verify($plainPassword, $hashedPassword);
    }
}
