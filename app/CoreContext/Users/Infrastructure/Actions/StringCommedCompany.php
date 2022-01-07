<?php

namespace App\CoreContext\Users\Infrastructure\Actions;

class StringCommedCompany
{
    public static function execute($companies)
    {
        $string = '';

        foreach ($companies as $company) {
            $string .= $company->symbol.',';
        }

        return $string;

    }
}
