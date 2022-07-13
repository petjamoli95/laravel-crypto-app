<?php

namespace App\Repositories;

use App\Interfaces\CryptoDetailsInterface;
use App\Models\CryptoDetails;

class CryptoDetailsRepository implements CryptoDetailsInterface
{
  
  public function getTopCryptoDetails()
  {
    return CryptoDetails::orderBy('market_cap_rank')->paginate(100);
  }
  
}