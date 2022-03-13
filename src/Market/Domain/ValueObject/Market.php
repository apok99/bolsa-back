<?php

declare(strict_types=1);

namespace App\Market\Domain\ValueObject;

use App\Market\Domain\Exception\InvalidMarketException;
use App\Shared\Domain\Validator\ValueObject;
use ReflectionClass;

class Market implements ValueObject
{
    public const NASDAQ = 'nasdaq';
    public const CRYPTO = 'crypto';
    public const NYSE = 'nyse';
    public const EURONEXT = 'euronext';

    public function __construct(
        private string $value
    )
    {
        self::validate($value);
    }

    public static function validate(string $value): void
    {
        if (!in_array($value, self::allValues(), true))
        {
            throw new InvalidMarketException();
        }
    }

    public static function allValues(): array
    {
        return (new ReflectionClass(self::class))->getConstants();
    }

    public function isNasdaq(): bool
    {
        return self::NASDAQ === $this->value;
    }

    public function isNyse(): bool
    {
        return self::NYSE === $this->value;
    }

    public function isCrypto(): bool
    {
        return self::CRYPTO === $this->value;
    }

    public function isEuronext(): bool
    {
        return self::EURONEXT === $this->value;
    }
}