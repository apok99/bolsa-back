<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Validator\Constraint;

use App\Shared\Domain\Validator\ValidatorMessage;
use Symfony\Component\Validator\Constraint;

class ValueObjectConstraint extends Constraint
{
    public string $class;
    public string $message;

    public function __construct(string $class, string $message = null, mixed $options = null, array $groups = null, mixed $payload = null)
    {
        parent::__construct($options, $groups, $payload);
        $this->class = $class;
        $this->message = $message ?? ValidatorMessage::VALUE_OBJECT_CONSTRAINT;
    }

    public static function create(string $class, string $message = null, array $options = null): self
    {
        return new self($class, $message, $options);
    }
}
