<?php

use App\CoreContext\Users\Infrastructure\Controllers\AuthUserController;
use App\CoreContext\Users\Infrastructure\Controllers\CreateUserController;
use App\CoreContext\Users\Infrastructure\Controllers\MeUserController;
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

});
