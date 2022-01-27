<?php

namespace App\CoreContext\Company\Domain\ModelView;

class CompanyView
{
    private int $id;
    private string $name;
    private string $symbol;

    public function __construct(int $id, string $name, string $symbol)
    {
        $this->id = $id;
        $this->name = $name;
        $this->symbol = $symbol;
    }

}
