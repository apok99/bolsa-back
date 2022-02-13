<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Validator;

/** @method validateBy() */
abstract class BaseValidator implements Validator
{
    public function __construct(private array $payload)
    {
    }

    abstract public static function constraints(): array;

    protected static function validate(array $payload): self
    {
        SymfonyValidator::validate(static::class, $payload);
        return new static($payload);
    }

    protected function payload(string $key): mixed
    {
        return $this->payload[$key] ?? null;
    }
}
