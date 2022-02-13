<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Validator\Type\Basic;

use App\Shared\Domain\Validator\ValidatorMessage;
use Symfony\Component\Validator\Constraint;

class RepeatedField extends Constraint
{
    public string $field;
    public string $message;

    public function __construct(
        string $field,
        string $message = null,
        mixed $options = null,
        array $groups = null,
        mixed $payload = null
    )
    {
        parent::__construct($options, $groups, $payload);
        $this->message = $message ?? ValidatorMessage::REPEATED_FIELD_CONSTRAINT;
        $this->field = $field;
    }

    public static function create(string $field, string $message = null): self
    {
        return new self($field, $message);
    }
}
