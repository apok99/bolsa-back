<?php

namespace App\CoreContext\User\Infrastructure\Controller;

use App\CoreContext\User\Application\Command\UserBuy;
use App\CoreContext\User\Application\Command\UserBuyHandler;
use App\CoreContext\User\Application\Query\FindUserWallets;
use App\CoreContext\User\Application\Query\FindUserWalletsHandler;
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
