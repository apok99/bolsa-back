<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Validator\Type\Basic;

use App\Shared\Domain\Validator\ValidatorMessage;
use Symfony\Component\Validator\Constraints\Type;

class TypeConstraint
{
    public static function create(
        string $type,
        string $message = null,
        array $options = null
    ) : Type
    {
        return new Type(
            $type,
            $message ?? ValidatorMessage::TYPE_CONSTRAINT,
            null,
            null,
            $options ?? []
        );
    }
}
