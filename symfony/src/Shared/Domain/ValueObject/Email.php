<?php

namespace App\Shared\Domain\ValueObject;

class Email
{
    protected string $email;

    public function __construct(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            throw new \InvalidEmailException();
        }

        $this->email = $email;
    }

    public function value(): string
    {
        return $this->email;
    }

    public function __toString(): string
    {
        return $this->email;
    }
}
