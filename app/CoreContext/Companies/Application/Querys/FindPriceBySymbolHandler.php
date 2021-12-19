<?php

namespace App\CoreContext\Companies\Application\Querys;

class FindPriceBySymbolHandler
{
    const API = 'https://financialmodelingprep.com/api/v3/profile/';
    const KEY = '?apikey=7b7863bc8a7b9c26334b80c2c8af9a7d';

    public function handle(FindPriceBySymbol $findPriceBySymbol){
        set_time_limit(0);

        $url_info = self::API.$findPriceBySymbol->symbol().self::KEY;
        $channel = curl_init();

        curl_setopt($channel, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($channel, CURLOPT_HEADER, 0);
        curl_setopt($channel, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($channel, CURLOPT_URL, $url_info);
        curl_setopt($channel, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($channel, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($channel, CURLOPT_TIMEOUT, 0);
        curl_setopt($channel, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($channel, CURLOPT_SSL_VERIFYHOST, FALSE);


        curl_setopt($channel, CURLOPT_SSL_VERIFYPEER, FALSE);

        $output = curl_exec($channel);

        if (curl_error($channel)) {
            return 'error:' . curl_error($channel);
        } else {
            $outputJSON = json_decode($output);
            return $outputJSON[0]->price;
        }
    }
}
