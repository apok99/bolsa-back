<?php

declare(strict_types=1);

namespace App\Api\Domain\ValueObject;

class ApiResponse
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
}
