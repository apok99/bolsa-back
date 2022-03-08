<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Validator\Constraint;

use App\Shared\Domain\Validator\ValidatorMessage;
use Symfony\Component\Validator\Constraints\Type;

class TypeConstraint
{
    public const BOOL_TYPE = 'bool';
    public const ARRAY_TYPE = 'array';

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
