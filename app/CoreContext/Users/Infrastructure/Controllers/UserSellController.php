<?php

namespace App\CoreContext\Users\Infrastructure\Controllers;

use App\CoreContext\Companies\Application\Querys\FindPriceBySymbol;
use App\CoreContext\Companies\Application\Querys\FindPriceBySymbolHandler;
use App\CoreContext\Users\Application\Commands\UserSell;
use App\CoreContext\Users\Application\Commands\UserSellHandler;
use App\CoreContext\Users\Infrastructure\Validators\SellValidator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserSellController extends Controller
{
    const SYMBOL = 'symbol';
    const USER = 'user';
    const QUANTITY = 'quantity';
    const PRICE = 'price';
    const COMISION = 0.98;

    public function __invoke(Request $request)
    {
        $this->user = auth()->user();

        $findPriceBySymbol = [
            self::SYMBOL => $request->symbol,
        ];

        if (Cache::has($request->symbol)){
            $price = Cache::get($request->symbol);
        }else{
            $price = $this->handle(FindPriceBySymbol::class, FindPriceBySymbolHandler::class, $findPriceBySymbol);
            Cache::put($request->symbol, $price, 10);
        }

        $transaction = [
            self::SYMBOL => $request->symbol,
            self::USER => $this->user,
            self::QUANTITY => $request->quantity,
            self::PRICE => $price
        ];

        $this->handle(UserSell::class, UserSellHandler::class, $transaction);
        return response()->json(['sell' => true]);
    }
}
