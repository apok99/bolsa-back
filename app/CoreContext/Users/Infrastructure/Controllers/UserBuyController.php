<?php

namespace App\CoreContext\Users\Infrastructure\Controllers;

use App\CoreContext\Companies\Application\Querys\FindPriceBySymbol;
use App\CoreContext\Companies\Application\Querys\FindPriceBySymbolHandler;
use App\CoreContext\Users\Application\Commands\UserBuy;
use App\CoreContext\Users\Application\Commands\UserBuyHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Cache;

class UserBuyController extends Controller
{
    const SYMBOL = 'symbol';
    const PRICE = 'price';
    const USER = 'user';
    const COST = 'cost';

    public function __invoke(Request $request)
    {

        $validator = \Validator::make($request->all(), [
            'cost' => 'required|gt:0'
        ]);

        if ($validator->fails()) {
            throw new \Exception('Please send valid data.');
        }

        $this->user = auth()->user();

        $query = [
            self::SYMBOL => $request->symbol,
        ];

        if (Cache::has($request->symbol)){
            $price = Cache::get($request->symbol);
        }else{
            $price = $this->handle(FindPriceBySymbol::class, FindPriceBySymbolHandler::class, $query);
            Cache::put($request->symbol, $price, 10);
        }

        $transaction = [
            self::PRICE => $price,
            self::COST => $request->cost,
            self::SYMBOL => $request->symbol,
            self::USER => $this->user
        ];

        $this->handle(UserBuy::class, UserBuyHandler::class, $transaction);
        return response()->json(['buy' => true]);
    }
}
