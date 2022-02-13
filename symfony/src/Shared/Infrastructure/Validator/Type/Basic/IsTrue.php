<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Validator\Type\Basic;

use App\Shared\Domain\Validator\ValidatorMessage;
use Symfony\Component\Validator\Constraints\IsTrue as SfIsTrue;

class IsTrue
{
    public static function create(
        string $message = null,
        array $options = null
    ) : SfIsTrue
    {
        return new SfIsTrue(
            $options,
            $message ?? ValidatorMessage::IS_TRUE_CONSTRAINT
        );
    }
}
