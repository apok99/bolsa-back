<?php

namespace App\CoreContext\Users\Infrastructure\Controllers;

use App\CoreContext\Users\Application\Commands\UserBuy;
use App\CoreContext\Users\Application\Commands\UserBuyHandler;
use App\CoreContext\Users\Application\Querys\FindUserWallets;
use App\CoreContext\Users\Application\Querys\FindUserWalletsHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserWalletsController extends Controller
{

    const USER = 'user';
    const WALLETS = 'wallets';

    public function __invoke(Request $request)
    {
        $this->user = auth()->user();

        $query = [
            self::USER => $this->user
        ];

        if (Cache::has(self::WALLETS.$this->user->id)){
            $wallets = Cache::get(self::WALLETS.$this->user->id);
        }else{
            $wallets = $this->handle(FindUserWallets::class, FindUserWalletsHandler::class, $query);
            Cache::put(self::WALLETS.$this->user->id, $wallets, 8);
        }
        return response()->json($wallets);
    }
}
