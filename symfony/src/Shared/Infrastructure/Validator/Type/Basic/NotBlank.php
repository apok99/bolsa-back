<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Validator\Type\Basic;

use App\Shared\Domain\Validator\ValidatorMessage;
use Symfony\Component\Validator\Constraints\NotBlank as SfNotBlank;

class NotBlank
{
    public static function create($message = null, $options = null): SfNotBlank
    {
        return new SfNotBlank(
            $options,
            $message ?? ValidatorMessage::NOT_BLANK_CONSTRAINT
        );
    }
}
