<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Validator\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class StringTypeValidator extends ConstraintValidator
{
    public function validate(mixed $value, Constraint $constraint)
    {
        if (!$constraint instanceof StringType)
        {
            throw new UnexpectedTypeException($constraint, StringType::class);
        }

        if (null === $value || '' === $value)
        {
            return;
        }

        if (!is_string($value))
        {
            $this->context->buildViolation(
                $constraint->message
            )->addViolation();
        }
    }
}
