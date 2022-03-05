<?php

declare(strict_types=1);

namespace App\Security\Infrastructure\Validator;

use App\Shared\Domain\Validator\ValidatorMessage;
use App\Shared\Domain\ValueObject\Email;
use App\Shared\Infrastructure\Validator\BaseValidator;
use App\Shared\Infrastructure\Validator\Type\Basic\IsTrue;
use App\Shared\Infrastructure\Validator\Type\Basic\Length;
use App\Shared\Infrastructure\Validator\Type\Basic\NotBlank;
use App\Shared\Infrastructure\Validator\Type\Basic\NotCompromisedPasswordConstraint;
use App\Shared\Infrastructure\Validator\Type\Basic\NotNull;
use App\Shared\Infrastructure\Validator\Type\Basic\RepeatedField;
use App\Shared\Infrastructure\Validator\Type\Basic\StringType;
use App\Shared\Infrastructure\Validator\Type\Basic\TypeConstraint;
use App\Shared\Infrastructure\Validator\Type\Basic\UniqueEmailConstraint;
use App\Shared\Infrastructure\Validator\Type\Basic\UniqueUsernameConstraint;
use App\Shared\Infrastructure\Validator\Type\Basic\ValueObjectConstraint;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

class RegisterValidator extends BaseValidator
{
    private const USERNAME = 'username';
    private const EMAIL = 'email';
    private const PASSWORD = 'password';
    private const CONFIRM_PASSWORD = 'confirmPassword';
    private const TOS = 'tos';

    public static function validateBy(array $payload): self
    {
        return self::validate($payload);
    }

    public static function constraints(): array
    {
        return [
            self::USERNAME => [
                NotNull::create(),
                NotBlank::create(),
                StringType::create(),
                UniqueUsernameConstraint::create()
            ],
            self::EMAIL => [
                NotNull::create(),
                NotBlank::create(),
                ValueObjectConstraint::create(Email::class, ValidatorMessage::EMAIL_TYPE_CONSTRAINT),
                UniqueEmailConstraint::create()
            ],
            self::PASSWORD => [
                NotNull::create(),
                NotBlank::create(),
                StringType::create(),
                Length::create(8),
                NotCompromisedPasswordConstraint::create()
            ],
            self::CONFIRM_PASSWORD => [
                NotNull::create(),
                NotBlank::create(),
                StringType::create(),
                RepeatedField::create(self::PASSWORD, ValidatorMessage::PASSWORDS_DO_NOT_MATCH)
            ],
            self::TOS => [
                NotNull::create(),
                NotBlank::create(),
                TypeConstraint::create('bool'),
                IsTrue::create()
            ]
        ];
    }

    public function username(): string
    {
        return $this->payload(self::USERNAME);
    }

    public function email(): string
    {
        return $this->payload(self::EMAIL);
    }

    public function password(): string
    {
        return $this->payload(self::PASSWORD);
    }

    public function tos(): bool
    {
        return $this->payload(self::TOS);
    }
}
