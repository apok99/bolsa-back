<?php

namespace App\Shared\Domain\ValueObject;

use App\Company\Domain\Model\Company;
use App\Shared\Domain\Exception\InvalidEntityReferenceTypeException;
use App\Shared\Domain\Validator\ValueObject;
use Ramsey\Uuid\UuidInterface;
use ReflectionClass;

class EntityReference implements ValueObject
{
    private UuidInterface $id;
    private string $type;

    public const COMPANY = 'company';
    public const CRYPTO = 'crypto';
    public const FOREX = 'forex';

    public function __construct(
        UuidInterface $id,
        string $type
    )
    {
        self::validate($type);
        $this->id = $id;
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

    public function id(): UuidInterface
    {
        return $this->id;
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

    public static function fromCompany(Company $company): self
    {
        return new self(
            $company->id(),
            self::COMPANY
        );
    }
}
