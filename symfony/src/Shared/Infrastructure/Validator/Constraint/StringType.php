<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Validator\Constraint;

use App\Shared\Domain\Validator\ValidatorMessage;
use Symfony\Component\Validator\Constraint;

class StringType extends Constraint
{
    public string $message;

    public static function create(string $message = null): self
    {
        $constraint = new self();
        $constraint->message = $message ?? ValidatorMessage::STRING_TYPE_CONSTRAINT;

        return $constraint;
    }


}
