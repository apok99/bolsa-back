<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Validator;

use App\Shared\Application\Validator\ValidatorService;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class SymfonyValidator implements ValidatorService
{
    public function __construct(
        private ValidatorInterface $validator
    )
    {
    }

    public function validate(string $className, array $variables): void
    {
        // TODO: Implement validate() method.
    }
}
