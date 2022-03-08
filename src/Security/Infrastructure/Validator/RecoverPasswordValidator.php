<?php

declare(strict_types=1);

namespace App\Security\Infrastructure\Validator;

use App\Shared\Domain\Validator\ValidatorMessage;
use App\Shared\Domain\ValueObject\Email;
use App\Shared\Infrastructure\Validator\BaseValidator;
use App\Shared\Infrastructure\Validator\Constraint\NotBlank;
use App\Shared\Infrastructure\Validator\Constraint\NotNull;
use App\Shared\Infrastructure\Validator\Constraint\StringType;
use App\Shared\Infrastructure\Validator\Constraint\ValueObjectConstraint;

class RecoverPasswordValidator extends BaseValidator
{
    private const EMAIL = 'email';

    public static function validateBy(array $payload): self
    {
        return self::validate($payload);
    }

    public static function constraints(): array
    {
        return [
            self::EMAIL => [
                NotNull::create(),
                NotBlank::create(),
                StringType::create(),
                ValueObjectConstraint::create(Email::class, ValidatorMessage::EMAIL_TYPE_CONSTRAINT)
            ]
        ];
    }

    public function email(): string
    {
        return $this->payload(self::EMAIL);
    }
}
