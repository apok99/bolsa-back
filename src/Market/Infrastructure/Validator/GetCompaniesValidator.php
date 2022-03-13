<?php

declare(strict_types=1);

namespace App\Market\Infrastructure\Validator;

use App\Shared\Infrastructure\Validator\BaseValidator;
use App\Shared\Infrastructure\Validator\Constraint\NotBlank;
use App\Shared\Infrastructure\Validator\Constraint\NotNull;
use App\Shared\Infrastructure\Validator\Constraint\TypeConstraint;

class GetCompaniesValidator extends BaseValidator
{
    private const SYMBOLS = 'symbols';

    public static function validateBy(array $payload): self
    {
        return parent::validate($payload);
    }

    public static function constraints(): array
    {
        return [
            self::SYMBOLS => [
                NotNull::create(),
                NotBlank::create(),
                TypeConstraint::create(TypeConstraint::ARRAY_TYPE)
            ]
        ];
    }

    public function symbols(): array
    {
        return $this->payload(self::SYMBOLS);
    }
}