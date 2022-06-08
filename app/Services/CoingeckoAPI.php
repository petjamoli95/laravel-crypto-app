<?php

namespace App\Services;

use App\Models\CryptoDetails;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class CoingeckoAPI {

  protected $url;

  public function __construct()
  {
    $this->url = 'https://api.coingecko.com/api/v3';
  }

  public function getAllCoins(){
    return Http::get("{$this->url}/coins/list")->json();
  }

  public function getFeatured()
  {
    return Http::get("{$this->url}/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=10&page=1&sparkline=false&price_change_percentage=24h")->json();
  }

  public function getTopCoinMarketData()
  {
    return Http::get("{$this->url}/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=250&page=1&sparkline=false")->json();
  }

  public function getCoinData($id)
  {
    $response = Http::get("{$this->url}/coins/markets?vs_currency=usd&ids={$id}&order=market_cap_desc&per_page=1&page=1&sparkline=false")->json();
    $response = $response[0];

    return $result = CryptoDetails::updateOrCreate(
          ['api_id' => Arr::get($response, 'id')],
          ['symbol' => Arr::get($response, 'symbol'),
          'name' => Arr::get($response, 'name'),
          'image' => Arr::get($response, 'image'),
          'current_price' => Arr::get($response, 'current_price'),
          'market_cap' => Arr::get($response, 'market_cap'),
          'market_cap_rank' => Arr::get($response, 'market_cap_rank'),
          'fully_diluted_valuation' => Arr::get($response, 'fully_diluted_valuation'),
          'total_volume' => Arr::get($response, 'total_volume'),
          'high_24h' => Arr::get($response, 'high_24h'),
          'low_24h' => Arr::get($response, 'low_24h'),
          'price_change_24h' => Arr::get($response, 'price_change_24h'),
          'price_change_percentage_24h' => Arr::get($response, 'price_change_percentage_24h'),
          'market_cap_change_24h' => Arr::get($response, 'market_cap_change_24h'),
          'market_cap_change_percentage_24h' => Arr::get($response, 'market_cap_change_percentage_24h'),
          'circulating_supply' => Arr::get($response, 'circulating_supply'),
          'total_supply' => Arr::get($response, 'total_supply'),
          'max_supply' => Arr::get($response, 'max_supply'),
          'ath' => Arr::get($response, 'ath'),
          'ath_change_percentage' => Arr::get($response, 'ath_change_percentage'),
          'ath_date' => Carbon::parse(Arr::get($response, 'ath_date'))->format('Y-m-d H:m:s'),
          'atl' => Arr::get($response, 'atl'),
          'atl_change_percentage' => Arr::get($response, 'atl_change_percentage'),
          'atl_date' => Carbon::parse(Arr::get($response, 'atl_date'))->format('Y-m-d H:m:s'),
          'last_updated' => Carbon::parse(Arr::get($response, 'last_updated'))->format('Y-m-d H:m:s')]
        );
  }
}