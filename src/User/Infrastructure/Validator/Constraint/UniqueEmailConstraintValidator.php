<?php

namespace App\User\Infrastructure\Validator\Constraint;

use App\User\Domain\Model\UserRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class UniqueEmailConstraintValidator extends ConstraintValidator
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof UniqueEmailConstraint)
        {
            throw new UnexpectedTypeException($constraint, UniqueEmailConstraint::class);
        }

        if (null === $value || '' === $value)
        {
            return;
        }

        $user = $this->userRepository->byEmail($value);

        if (null !== $user)
        {
            $this->context->buildViolation(
                $constraint->message
            )->addViolation();
        }
    }

}
