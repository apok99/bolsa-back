<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Validator\Constraint;

use App\Shared\Domain\Validator\ValidatorMessage;
use Symfony\Component\Validator\Constraint;

class UniqueEmailConstraint extends Constraint
{
    public string $message;

    public static function create(string $message = null): self
    {
        $constraint = new self();
        $constraint->message = $message ?? ValidatorMessage::UNIQUE_EMAIL_CONSTRAINT;

        return $constraint;
    }
}
