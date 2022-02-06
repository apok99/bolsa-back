<?php

declare(strict_types=1);

namespace App\Shared\Application\Validator;

interface ValidatorService
{
    public function validate(string $className, array $variables): void;
}
