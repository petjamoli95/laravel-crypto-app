<?php

namespace App\Repositories;

use App\Interfaces\CryptoInterface;
use App\Models\Crypto;

class CryptoRepository implements CryptoInterface
{

  public function getCryptoBySearch($input)
  {
    return Crypto::where('api_id', 'like', '%'.$input.'%')
      ->orWhere('name', 'like', '%'.$input.'%')
      ->orWhere('symbol', 'like', $input)
      ->get();
  }
  
}