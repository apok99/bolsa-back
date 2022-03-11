<?php

declare(strict_types=1);

namespace App\MarketApi\Infrastructure\Validator;

use App\Shared\Infrastructure\Validator\BaseValidator;
use App\Shared\Infrastructure\Validator\Constraint\NotBlank;
use App\Shared\Infrastructure\Validator\Constraint\NotNull;
use App\Shared\Infrastructure\Validator\Constraint\TypeConstraint;

class GetCompaniesValidator extends BaseValidator
{
    private const COMPANIES = 'companies';

    public static function validateBy(array $payload): self
    {
        return parent::validate($payload);
    }

    public static function constraints(): array
    {
        return [
            self::COMPANIES => [
                NotNull::create(),
                NotBlank::create(),
                TypeConstraint::create(TypeConstraint::ARRAY_TYPE)
            ]
        ];
    }

    public function companies(): array
    {
        return $this->payload(self::COMPANIES);
    }
}