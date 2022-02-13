<?php

declare(strict_types=1);

namespace App\Shared\Domain\Exception;

class ValidationException extends \Exception
{
    private array $errors;

    public function __construct(array $errors)
    {
        parent::__construct();
        $this->errors = $errors;
    }

    public function errors(): array
    {
        return $this->errors;
    }
}
