<?php

use App\CoreContext\Company\Infrastructure\Controller\CreateCompaniesController;
use App\CoreContext\Company\Infrastructure\Controller\FilterNewsController;
use App\CoreContext\Company\Infrastructure\Controller\GetNewsController;
use App\CoreContext\Season\Applicaction\Command\GetRandomGiftCommand;
use App\CoreContext\Season\Infrastructure\Controller\GetSeasonController;
use App\CoreContext\Season\Infrastructure\Controller\SeasonStartController;
use App\CoreContext\User\Infrastructure\Controller\AuthUserController;
use App\CoreContext\User\Infrastructure\Controller\BankLoadDaily;
use App\CoreContext\User\Infrastructure\Controller\BuyBusinessController;
use App\CoreContext\User\Infrastructure\Controller\CreateUserController;
use App\CoreContext\User\Infrastructure\Controller\GetAllBusinessController;
use App\CoreContext\User\Infrastructure\Controller\GetBankLoans;
use App\CoreContext\User\Infrastructure\Controller\GetBestWorthDailyController;
use App\CoreContext\User\Infrastructure\Controller\GetBusinessController;
use App\CoreContext\User\Infrastructure\Controller\MeUserController;
use App\CoreContext\User\Infrastructure\Controller\RedeemBusineess;
use App\CoreContext\User\Infrastructure\Controller\RedeemBusiness;
use App\CoreContext\User\Infrastructure\Controller\RequestBankLoadUser;
use App\CoreContext\User\Infrastructure\Controller\UserBuyController;
use App\CoreContext\User\Infrastructure\Controller\UserCompaniesInfo;
use App\CoreContext\User\Infrastructure\Controller\UserGetHistoricalWorthsController;
use App\CoreContext\User\Infrastructure\Controller\UserGetWorthPatrimony;
use App\CoreContext\User\Infrastructure\Controller\UserSellController;
use App\CoreContext\User\Infrastructure\Controller\UserWalletsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes

|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/user', [CreateUserController::class, '__invoke'])->name('createUser');
Route::post('/login', [AuthUserController::class, 'login'])->name('login');

Route::middleware('jwtAuth')->group(callback: function () {

    Route::get('/me', [MeUserController::class, '__invoke'])->name('me');
    Route::post('/buy', [UserBuyController::class, '__invoke'])->name('buy');
    Route::post('/sell', [UserSellController::class, '__invoke'])->name('sell');
    Route::get('/users/wallets', [UserWalletsController::class, '__invoke'])->name('users-wallets');
    Route::get('/companies', [UserWalletsController::class, '__invoke'])->name('companies');
    Route::post('/season', [SeasonStartController::class, '__invoke'])->name('seasonStart');
    Route::get('/season', [GetSeasonController::class, '__invoke'])->name('getSeason');
    Route::get('/news', [GetNewsController::class, '__invoke'])->name('getNews');
    Route::post('/news', [FilterNewsController::class, '__invoke'])->name('filterGetNews');

    //Route::get('/random-gift-season', [GetRandomGiftController::class, '__invoke'])->name('random-gift-season');
    Route::get('/user/wallet-worth', [UserGetWorthPatrimony::class, '__invoke'])->name('user-wallet-worth');
    Route::get('/user/companies-info', [UserCompaniesInfo::class, '__invoke'])->name('user-companies-info');
    Route::get('/users/best-worths', [GetBestWorthDailyController::class, '__invoke'])->name('get-best-worths');
    Route::get('/user/historial-worths', [UserGetHistoricalWorthsController::class, '__invoke'])->name('user-get-historical-worths');
    Route::post('/user/bank-loan', [RequestBankLoadUser::class, '__invoke'])->name('user-bank-loan-request');
    Route::get('/bank-loan', [GetBankLoans::class, '__invoke'])->name('bank-loans');
    Route::get('/daily-pay-bank', [BankLoadDaily::class, '__invoke'])->name('daily-pay-bank');

    Route::get('/redeem-business', [RedeemBusiness::class, '__invoke'])->name('redeem-business');
    Route::get('/business', [GetAllBusinessController::class, '__invoke'])->name('get-business');
    Route::post('/business', [BuyBusinessController::class, '__invoke'])->name('buy-business');

});
//Route::get('/daily-users-worth-cron', [UserTotalWorthDaily::class, '__invoke'])->name('daily-cron-user');

Route::get('/companies-generate', [CreateCompaniesController::class, '__invoke'])->name('companies-generate');
Route::get('/hour', static function() {
    echo (new \DateTime('now', new \DateTimeZone('Europe/Madrid')))->format('d-M-Y H:i:s').'<br/>';
    echo (new \DateTime('now'))->format('d-M-Y H:i:s');
});
