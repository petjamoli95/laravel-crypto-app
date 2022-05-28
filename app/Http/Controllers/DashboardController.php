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
      $top_cryptos = CryptoDetails::all();
      $featured = $top_cryptos->sortBy('market_cap_rank');

      return view('dashboard', compact('featured'));
    }

    public function store(Request $request)
    {
      $item = Crypto::where('api_id', $request->api_id)->first();

      if ($item->watchlistedBy($request->user())) {
        return back();
      } else {
        $item->users()->attach([
          'user_id' => $request->user()->id
        ]);
      }

      return back();
    }

    public function destroy(Request $request)
    {
      $item = Crypto::where('api_id', $request->api_id)->first();

      $request->user()->cryptos()->detach($item->id);

      return back();
    }
}