<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Validator\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class ValueObjectConstraintValidator extends ConstraintValidator
{
    public function validate(mixed $value, Constraint $constraint)
    {
        if (!$constraint instanceof ValueObjectConstraint) {
            throw new UnexpectedTypeException($constraint, ValueObjectConstraint::class);
        }

        if (null === $value || '' === $value) {
            return;
        }

        try {
            $constraint->class::validate($value);
        } catch (\Exception $e) {
            $this->context->buildViolation(
                $constraint->message
            )->addViolation();
        }
    }
}
