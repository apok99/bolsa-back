<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Validator\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class ArrayConstraintValidator extends ConstraintValidator
{
    public function validate(mixed $value, Constraint $constraint)
    {
        if (!$constraint instanceof ArrayConstraint)
        {
            throw new UnexpectedTypeException($constraint, ArrayConstraint::class);
        }

        if (!is_array($value))
        {
            return;
        }

        $validator = $this->context->getValidator()->inContext($this->context);

        foreach ($constraint->properties() as $key => $constraints)
        {
            $validator->atPath('[' . $key . ']')->validate($value[$key] ?? null, $constraints);
        }
    }
}