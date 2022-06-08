<?php

namespace App\Http\Controllers;

use App\Models\Crypto;
use App\Models\CryptoDetails;
use App\Services\CoingeckoAPI;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show()
    {
      $featured = CryptoDetails::orderBy('market_cap_rank')->paginate(100);
      
      return view('dashboard', compact('featured'));
    }
}