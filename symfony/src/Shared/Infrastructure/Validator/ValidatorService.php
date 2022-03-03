<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Validator;

interface ValidatorService
{
    public function validate(string $class, array $variables): void;
}
