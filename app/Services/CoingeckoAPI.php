<?php

namespace App\Services;

use App\Models\CryptoDetails;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class CoingeckoAPI
{
    /**
     * @return array|mixed
     */
    public static function getAllCoins()
    {
        try {
            return Http::get(sprintf('%s/coins/list', config('coingecko.url')))->json();
        } catch (\Exception $e) {
            // TODO
            return [];
        }
    }

    /**
     * @return array|mixed
     */
    public static function getFeatured()
    {
        try {
            return Http::get(sprintf('%s/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=10&page=1&sparkline=false&price_change_percentage=24h', config('coingecko.url')))->json();
        } catch (\Exception $e) {
            // TODO
            return [];
        }
    }

    /**
     * @return array|mixed
     */
    public static function getTopCoinMarketData()
    {
        try {
            return Http::get(sprintf('%s/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=250&page=1&sparkline=false', config('coingecko.url')))->json();
        } catch (\Exception $e) {
            // TODO
            return [];
        }
    }

    /**
     * @param $id
     * @return array
     */
    public static function getCoinData($id)
    {
        try {
            $cryptoDetails = Http::get(sprintf('%s/coins/markets?vs_currency=usd&ids=%s&order=market_cap_desc&per_page=1&page=1&sparkline=false', config('coingecko.url'), $id))->json();
            $cryptoDetails = Arr::get($cryptoDetails, 0);
        } catch (\Exception $e) {
            // TODO
            return [];
        }

        // TODO: Save this via a job - This should also fire the same event as in UpdateTopCoinDetailsFromApi
        return CryptoDetails::updateOrCreate(
            [
                'api_id' => Arr::get($cryptoDetails, 'id'),
            ],
            array_merge($cryptoDetails, [
                'ath_date' => Carbon::parse(Arr::get($cryptoDetails, 'ath_date'))->format('Y-m-d H:m:s'),
                'atl_date' => Carbon::parse(Arr::get($cryptoDetails, 'atl_date'))->format('Y-m-d H:m:s'),
                'last_updated' => Carbon::parse(Arr::get($cryptoDetails, 'last_updated'))->format('Y-m-d H:m:s'),
            ])
        );
    }
}
