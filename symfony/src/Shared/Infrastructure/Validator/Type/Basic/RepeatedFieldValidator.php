<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Validator\Type\Basic;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class RepeatedFieldValidator extends ConstraintValidator
{
    public function validate(mixed $value, Constraint $constraint)
    {
        if (!$constraint instanceof RepeatedField)
        {
            throw new UnexpectedTypeException($constraint, RepeatedField::class);
        }

        if (null === $value || '' === $value)
        {
            return;
        }

        $field = $this->context->getRoot()[$constraint->field];

        if ($value !== $field)
        {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}
