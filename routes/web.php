<?php

use App\CoreContext\Companies\Infrastructure\Controllers\CreateCompaniesController;
use App\CoreContext\Season\Applicaction\Command\GetRandomGiftCommand;
use App\CoreContext\Season\Infrastructure\Controllers\GetRandomGiftController;
use App\CoreContext\Season\Infrastructure\Controllers\SeasonStartController;
use App\CoreContext\Users\Infrastructure\Controllers\AuthUserController;
use App\CoreContext\Users\Infrastructure\Controllers\CreateUserController;
use App\CoreContext\Users\Infrastructure\Controllers\MeUserController;
use App\CoreContext\Users\Infrastructure\Controllers\UserBuyController;
use App\CoreContext\Users\Infrastructure\Controllers\UserSellController;
use App\CoreContext\Users\Infrastructure\Controllers\UserWalletsController;
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

Route::middleware('jwtAuth')->group(function () {
    Route::get('/me', [MeUserController::class, '__invoke'])->name('me');
    Route::post('/buy', [UserBuyController::class, '__invoke'])->name('buy');
    Route::post('/sell', UserSellController::class, '__invoke')->name('sell');
    Route::get('/users/wallets', [UserWalletsController::class, '__invoke'])->name('users-wallets');
    Route::get('/companies', [UserWalletsController::class, '__invoke'])->name('companies');
    Route::post('/season', [SeasonStartController::class, '__invoke'])->name('seasonStart');
    Route::get('/random-gift-season', [GetRandomGiftController::class, '__invoke'])->name('random-gift-season');
});
Route::get('/companies-generate', [CreatecompaniesController::class, '__invoke'])->name('companies-generate');
