<?php

namespace App\Security\Domain;

interface PasswordEncoderInterface
{
    public function hash(string $plainPassword): string;
    public function validate(string $plainPassword, string $hashedPassword): bool;
}
