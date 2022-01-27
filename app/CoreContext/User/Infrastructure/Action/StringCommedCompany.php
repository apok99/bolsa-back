<?php

namespace App\CoreContext\User\Infrastructure\Action;

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
