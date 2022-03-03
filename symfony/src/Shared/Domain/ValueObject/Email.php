<?php
declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;

use App\Shared\Domain\Exception\InvalidEmailException;
use App\Shared\Domain\Validator\ValueObject;

class Email implements ValueObject
{
    protected string $value;

    public function __construct(string $value)
    {
        self::validate($value);
        $this->value = $value;
    }

    public static function validate(string $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL))
        {
            throw new InvalidEmailException();
        }
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
