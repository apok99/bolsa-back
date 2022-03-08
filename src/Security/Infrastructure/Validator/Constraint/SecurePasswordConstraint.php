<?php

declare(strict_types=1);

namespace App\Security\Infrastructure\Validator\Constraint;

use App\Shared\Domain\Validator\ValidatorMessage;
use Symfony\Component\Validator\Constraint;

class SecurePasswordConstraint extends Constraint
{
    public string $message;

    public static function create(string $message = null): self
    {
        $constraint = new self();
        $constraint->message = $message ?? ValidatorMessage::SECURE_PASSWORD_CONSTRAINT;

        return $constraint;
    }
}
