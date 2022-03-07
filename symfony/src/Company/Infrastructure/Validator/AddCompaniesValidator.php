<?php

declare(strict_types=1);

namespace App\Company\Infrastructure\Validator;

use App\Shared\Infrastructure\Validator\BaseValidator;
use App\Shared\Infrastructure\Validator\Constraint\TypeConstraint;

class AddCompaniesValidator extends BaseValidator
{
    public const SYMBOLS = 'symbols';

    public static function validateBy(array $payload): self
    {
        return parent::validate($payload);
    }

    public static function constraints(): array
    {
        return [
            self::SYMBOLS => TypeConstraint::create(TypeConstraint::ARRAY_TYPE)
        ];
    }

    public function symbols(): array
    {
        return $this->payload(self::SYMBOLS);
    }
}
