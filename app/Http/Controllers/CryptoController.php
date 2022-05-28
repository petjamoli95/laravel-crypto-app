<?php

namespace App\Http\Controllers;

use App\Models\Crypto;
use App\Services\CoingeckoAPI;
use Illuminate\Http\Request;

class CryptoController extends Controller
{
  public function index(Request $request)
  {
    $cryptos = Crypto::where('api_id', ($request->input()));

    dd($cryptos);

    return view('cryptos.index', compact('cryptos'));
  }

  public function show(Crypto $crypto, CoingeckoAPI $coingecko_api)
  {
    $crypto = $coingecko_api->getCoinData($crypto->api_id);

    return view('cryptos.show', compact('crypto'));
  }
}
