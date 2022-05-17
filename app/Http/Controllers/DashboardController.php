<?php

namespace App\Http\Controllers;

use App\Models\Crypto;
use App\Services\CoingeckoAPI;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private CoingeckoAPI $coingecko_api;

    public function __construct(CoingeckoAPI $coingecko_api)
    {
      $this->coingecko_api = $coingecko_api;
    }

    public function show()
    {
      $featured = $this->coingecko_api->getFeatured();

      return view('dashboard', compact('featured'));
    }

    public function store(Crypto $crypto, Request $request)
    {
      if ($crypto->watchlistedBy($request->user())) {
        return null;
      }

      $crypto->users()->attach([
        'user_id' => $request->user()->id
      ]);

      return back();
    }

    public function destroy(Crypto $crypto, Request $request)
    {
      $request->user()->cryptos()->where('crypto_id', $crypto->id)->delete();

      return back();
    }
}
