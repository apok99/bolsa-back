<?php

namespace App\CoreContext\Company\Infrastructure\Controller;

use App\CoreContext\User\Infrastructure\Helper\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilterNewsController extends Controller
{

    public function __invoke(Request $request)
    {
        $news = ApiHelper::get('https://financialmodelingprep.com/api/v3/stock_news?tickers='.$request->symbol.'&limit=50&apikey=7b7863bc8a7b9c26334b80c2c8af9a7d', false);
        return response()->json($news);
    }

}
