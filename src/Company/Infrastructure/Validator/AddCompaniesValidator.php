<?php

declare(strict_types=1);

namespace App\Company\Infrastructure\Validator;

use App\Shared\Infrastructure\Validator\BaseValidator;
use App\Shared\Infrastructure\Validator\Constraint\AllConstraint;
use App\Shared\Infrastructure\Validator\Constraint\ArrayConstraint;
use App\Shared\Infrastructure\Validator\Constraint\NotBlank;
use App\Shared\Infrastructure\Validator\Constraint\NotNull;
use App\Shared\Infrastructure\Validator\Constraint\StringType;
use App\Shared\Infrastructure\Validator\Constraint\TypeConstraint;

class AddCompaniesValidator extends BaseValidator
{
    public const COMPANIES = 'companies';
    public const SYMBOL = 'symbol';
    public const ACTIVE = 'active';

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
                TypeConstraint::create(TypeConstraint::ARRAY_TYPE),
                AllConstraint::create(ArrayConstraint::create([
                    self::SYMBOL => [
                        NotNull::create(),
                        NotBlank::create(),
                        StringType::create(),
                        // TODO: Add CompanyDoesNotExistConstraint (?)
                    ],
                    self::ACTIVE => [
                        TypeConstraint::create(TypeConstraint::BOOL_TYPE)
                    ]
                ]))
            ]
        ];
    }

    public function companies(): array
    {
        return $this->payload(self::COMPANIES);
    }
}
