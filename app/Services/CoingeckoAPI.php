<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CoingeckoAPI {

  protected $url;

  public function __construct()
  {
    $this->url = 'https://api.coingecko.com/api/v3';
  }

  public function getFeatured()
  {
    return Http::get("{$this->url}/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=10&page=1&sparkline=false&price_change_percentage=24h")->json();
  }
}