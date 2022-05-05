<?php

namespace App\Http\Controllers;

use App\Services\CoingeckoAPI;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private CoingeckoAPI $coingecko_api;

    public function __construct(CoingeckoAPi $coingecko_api)
    {
      $this->coingecko_api = $coingecko_api;
    }

    public function showFeatured()
    {
      $featured = $this->coingecko_api->getFeatured();

      return view('dashboard', compact('featured'));
    }
}
