<?php

namespace App\CoreContext\Company\Domain\ModelView;

class CompanyViewFactory
{

    public static function create($company)
    {
        return new CompanyView(
            $company->id,
            $company->name,
            $company->symbol
        );
    }

}
