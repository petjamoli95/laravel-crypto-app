<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CryptoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WatchlistController;
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

Route::get('/', [DashboardController::class, 'show'])->name('dashboard');
Route::post('/', [DashboardController::class, 'store']);
Route::delete('/{crypto}', [DashboardController::class, 'destroy'])->name('dashboard.destroy');

Route::get('/watchlist', [WatchlistController::class, 'show'])->name('watchlist');
Route::delete('/watchlist/{crypto}', [WatchlistController::class, 'destroy'])->name('watchlist.destroy');

Route::post('/cryptos', [CryptoController::class, 'index'])->name('cryptos.index');
Route::get('/cryptos/{crypto:api_id}', [CryptoController::class, 'show'])->name('cryptos.show');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);