<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Crypto\CryptoController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Watchlist\WatchlistController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('watchlist', WatchlistController::class, ['only' => ['index', 'store', 'destroy']]);

Route::resource('crypto', CryptoController::class, ['only' => ['index', 'show']]);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout')->middleware('auth');

Route::resource('login', LoginController::class, ['only' => ['index', 'store']]);

Route::resource('register', RegisterController::class, ['only' => ['index', 'store']]);