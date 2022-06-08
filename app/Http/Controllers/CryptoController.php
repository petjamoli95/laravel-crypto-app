<?php

namespace App\Http\Controllers;

use App\Models\Crypto;
use App\Services\CoingeckoAPI;
use Illuminate\Http\Request;

class CryptoController extends Controller
{
  public function index(Request $request)
  {
    $cryptos = Crypto::where('api_id', 'like', '%'.$request->input('search').'%')
      ->orWhere('name', 'like', '%'.$request->input('search').'%')
      ->orWhere('symbol', 'like', $request->input('search'))
      ->get();

    return view('crypto.index', compact('cryptos'));
  }

  public function show(Crypto $crypto, CoingeckoAPI $coingecko_api)
  {
    $crypto = $coingecko_api->getCoinData($crypto->api_id);

    return view('crypto.show', compact('crypto'));
  }
}
