<?php

namespace App\Security\Infrastructure\Validator\Constraint;

use App\Shared\Domain\Validator\ValidatorMessage;
use Symfony\Component\Validator\Constraints\NotCompromisedPassword;

class NotCompromisedPasswordConstraint extends NotCompromisedPassword
{
    public static function create(
        string $message = null,
        array $options = []
    ): NotCompromisedPassword
    {
        return new NotCompromisedPassword(
            $options,
            $message ?? ValidatorMessage::NOT_COMPROMISED_PASSWORD_CONSTRAINT
        );
    }
}
