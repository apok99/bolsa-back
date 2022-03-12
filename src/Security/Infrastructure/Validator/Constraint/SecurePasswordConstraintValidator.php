<?php

declare(strict_types=1);

namespace App\Security\Infrastructure\Validator\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class SecurePasswordConstraintValidator extends ConstraintValidator
{
    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof SecurePasswordConstraint)
        {
            throw new UnexpectedTypeException($constraint, SecurePasswordConstraint::class);
        }

        if (null === $value || '' === $value)
        {
            return;
        }

        $hasLowercaseLetter = preg_match('/\p{Ll}/u', $value);
        $hasUppercaseLetter = preg_match('/\p{Lu}/u', $value);
        $hasNumber = preg_match('/\p{Nd}/u', $value);
        $hasSymbol = preg_match('/[!¡@#%¿?$&\/()\[\]{}^*\-.,:|_]/u', $value);

        if (!$hasLowercaseLetter || !$hasUppercaseLetter || !$hasNumber || !$hasSymbol)
        {
            $this->context->buildViolation(
                $constraint->message
            )->addViolation();
        }
    }
}
