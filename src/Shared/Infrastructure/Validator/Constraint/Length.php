<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Validator\Constraint;

use App\Shared\Domain\Validator\ValidatorMessage;
use Symfony\Component\Validator\Constraints\Length as SfLength;

class Length
{
    public static function create(
        int $min,
        int $max = null,
        string $minMessage = null,
        string $maxMessage = null,
        array $options = null
    ): SfLength
    {
        return new SfLength(
            null,
            $min,
            $max,
            null,
            null,
            null,
            $minMessage ?? ValidatorMessage::MIN_LENGTH_CONSTRAINT,
            $maxMessage ?? ValidatorMessage::MAX_LENGTH_CONSTRAINT,
            null,
            null,
            null,
            $options ?? []
        );
    }
}
