<?php

namespace App\Shared\Domain\ValueObject;

use App\Shared\Domain\Exception\InvalidEntityReferenceTypeException;
use App\Shared\Domain\Validator\ValueObject;
use Ramsey\Uuid\UuidInterface;
use ReflectionClass;

class EntityReference implements ValueObject
{
    private UuidInterface $uuid;
    private string $type;

    public const COMPANY = 'company';
    public const CRYPTO = 'crypto';
    public const FOREX = 'forex';

    public function __construct(
        UuidInterface $uuid,
        string $type
    )
    {
        self::validate($type);
        $this->uuid = $uuid;
        $this->type = $type;
    }

    public static function validate(string $type)
    {
        if (!in_array($type, self::allValues(), true))
        {
            throw new InvalidEntityReferenceTypeException();
        }
    }

    public static function allValues(): array
    {
        return (new ReflectionClass(self::class))->getConstants();
    }

    public function uuid(): UuidInterface
    {
        return $this->uuid;
    }

    public function type(): string
    {
        return $this->type;
    }

    public function isCompany(): bool
    {
        return self::COMPANY === $this->type;
    }

    public function isCrypto(): bool
    {
        return self::CRYPTO === $this->type;
    }

    public function isForex(): bool
    {
        return self::FOREX === $this->type;
    }
}
