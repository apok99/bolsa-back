<?php

namespace App\Security\Domain\Service;

interface PasswordEncoderInterface
{
    public function hash(string $plainPassword): string;
    public function validate(string $plainPassword, string $hashedPassword): bool;
}
