<?php

namespace App\Http\Controllers;

use App\Interfaces\CryptoInterface;
use App\Models\Crypto;
use App\Services\CoingeckoAPI;
use Illuminate\Http\Request;

class CryptoController extends Controller
{
  private CryptoInterface $cryptoRepository;

  public function __construct(CryptoInterface $cryptoRepository)
  {
    $this->cryptoRepository = $cryptoRepository;
  }
  
  public function index(Request $request)
  {
    $cryptos = $this->cryptoRepository->getCryptoBySearch($request->input('search'));

    return view('crypto.index', compact('cryptos'));
  }

  public function show(Crypto $crypto, CoingeckoAPI $coingecko_api)
  {
    $crypto = $coingecko_api->getCoinData($crypto->api_id);

    return view('crypto.show', compact('crypto'));
  }
}
