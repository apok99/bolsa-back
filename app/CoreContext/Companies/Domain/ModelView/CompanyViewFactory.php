<?php

namespace App\CoreContext\Companies\ModelView;

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
