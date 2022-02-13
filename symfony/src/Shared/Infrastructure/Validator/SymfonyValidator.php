<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Validator;

use App\Shared\Domain\Exception\ValidationException;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;

class SymfonyValidator implements ValidatorService
{
    public static function validate(string $class, array $variables): void
    {
        /** @var Validator $class */
        $constraints = new Collection($class::constraints());

        self::nullifyMissingValues($variables, $constraints);

        $violations = Validation::createValidator()->validate($variables,$constraints);

        if (0 === $violations->count())
        {
            return;
        }

        throw new ValidationException(
            self::parseErrors($violations)
        );
    }

    private static function parseErrors(ConstraintViolationList $violations): array
    {
        $errors = [];

        $violationsIterator = $violations->getIterator();
        $propertyAccessor = PropertyAccess::createPropertyAccessor();

        /** @var ConstraintViolation $violation */
        foreach ($violationsIterator as $key => $violation)
        {
            $propertyErrors = (array)$propertyAccessor->getValue($errors, $violation->getPropertyPath());
            $propertyErrors[] = $violation->getMessage();
            $propertyAccessor->setValue($errors, $violation->getPropertyPath(), $propertyErrors);
        }

        return $errors;
    }

    private static function nullifyMissingValues(array &$variables, Collection $constraints): void
    {
        $fields = array_keys($constraints->fields);

        foreach ($fields as $field) {
            if (!isset($variables[$field])) {
                $variables[$field] = null;
            }
        }
    }
}
