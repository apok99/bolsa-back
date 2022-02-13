<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Validator\Type\Basic;

use App\Shared\Domain\Validator\ValidatorMessage;
use Symfony\Component\Validator\Constraints\NotNull as SfNotNull;

class NotNull
{
    public static function create($message = null, $options = null): SfNotNull
    {
        return new SfNotNull(
            $options,
            $message ?? ValidatorMessage::NOT_NULL_CONSTRAINT
        );
    }
}
