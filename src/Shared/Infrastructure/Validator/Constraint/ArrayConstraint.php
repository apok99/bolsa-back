<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Validator\Constraint;

use Symfony\Component\Validator\Constraint;

class ArrayConstraint extends Constraint
{
    private array $properties;

    public function __construct(array $properties = [], mixed $options = null, array $groups = null, mixed $payload = null)
    {
        $this->properties = $properties;
        parent::__construct($options, $groups, $payload);
    }

    public static function create(array $properties): self
    {
        return new self($properties);
    }

    public function properties(): array
    {
        return $this->properties;
    }
}