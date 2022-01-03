<?php

namespace App\CoreContext\Users\Infrastructure\Validators;

use Validator;

class SellValidator
{
    private const QUANTITY = 'quantity';
    private const SYMBOL = 'symbol';

    public static function validate($request){
        return Validator::make($request,[
                self::QUANTITY => '
                   float | required
                ',
                self::SYMBOL => '
                    required
                '
            ]
        );
    }

}
