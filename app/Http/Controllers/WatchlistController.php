<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    public function __construct()
    {
      $this->middleware(['auth']);
    }
    
    public function show()
    {
      $cryptos = Auth::user()->cryptos;

      return view('users.watchlist', compact('cryptos'));
    }
}
