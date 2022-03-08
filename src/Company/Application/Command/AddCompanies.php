<?php

declare(strict_types=1);

namespace App\Company\Application\Command;

use App\CQRS\Application\Command\Command;

class AddCompanies implements Command
{
    public function __construct(
        private array $symbols
    )
    {
    }

    public function symbols(): array
    {
        return $this->symbols;
    }
}
