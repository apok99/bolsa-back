<?php

namespace App\User\Infrastructure\Validator\Constraint;

use App\User\Domain\Model\UserRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class UniqueUsernameConstraintValidator extends ConstraintValidator
{
    private UserRepository $userRepository;

    public function __construct(
        UserRepository $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function validate(mixed $value, Constraint $constraint)
    {
        if (!$constraint instanceof UniqueUsernameConstraint)
        {
            throw new UnexpectedTypeException($constraint, UniqueUsernameConstraint::class);
        }

        if (null === $value || '' === $value)
        {
            return;
        }

        $user = $this->userRepository->byUsername($value);

        if (null !== $user)
        {
            $this->context->buildViolation(
                $constraint->message
            )->addViolation();
        }
    }

}
