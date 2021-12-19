<?php

namespace App\CoreContext\Companies\Domain\Entities;

interface CompanyRepository
{
    public function findBySymbol($symbol);

    public function getPrice();
}
