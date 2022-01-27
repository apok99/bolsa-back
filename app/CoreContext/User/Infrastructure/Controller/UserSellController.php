<?php

namespace App\CoreContext\User\Infrastructure\Controller;

use App\CoreContext\Company\Application\Query\FindPriceBySymbol;
use App\CoreContext\Company\Application\Query\FindPriceBySymbolHandler;
use App\CoreContext\User\Application\Command\UserSell;
use App\CoreContext\User\Application\Command\UserSellHandler;
use App\CoreContext\User\Infrastructure\Validator\SellValidator;
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

        $validator = \Validator::make($request->all(), [
            'quantity' => 'required|gt:0'
        ]);

        if ($validator->fails()) {
            throw new \Exception('Please send valid data.');
        }


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
