<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Validator;

interface ValidatorService
{
    public static function validate(string $class, array $variables): void;
}
