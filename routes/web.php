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
Route::post('/', [WatchlistController::class, 'store']);
Route::delete('/{crypto}', [WatchlistController::class, 'destroy'])->name('dashboard.destroy');

Route::get('/watchlist', [WatchlistController::class, 'show'])->name('watchlist');
Route::delete('/watchlist/{crypto}', [WatchlistController::class, 'destroy'])->name('watchlist.destroy');

Route::post('/cryptos/index', [CryptoController::class, 'index'])->name('crypto.index');
Route::get('/cryptos/show/{crypto:api_id}', [CryptoController::class, 'show'])->name('crypto.show');
Route::post('/cryptos/show/', [WatchlistController::class, 'store'])->name('crypto.store');
Route::delete('/cryptos/show/', [WatchlistController::class, 'destroy'])->name('crypto.destroy');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Route::resource('cryptos', CryptoController::class);