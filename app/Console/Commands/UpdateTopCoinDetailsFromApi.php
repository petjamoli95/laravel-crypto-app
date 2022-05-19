<?php

namespace App\Console\Commands;

use App\Models\CryptoDetails;
use App\Services\CoingeckoAPI;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class UpdateTopCoinDetailsFromApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(CoingeckoAPI $coingecko_api)
    {
      $response = $coingecko_api->getTopCoinMarketData();

      foreach ($response as $item)
      {
        $crypto = CryptoDetails::where('api_id', Arr::get($item, 'id'))->update([
          'api_id' => Arr::get($item, 'id'),
          'symbol' => Arr::get($item, 'symbol'),
          'name' => Arr::get($item, 'name'),
          'image' => Arr::get($item, 'image'),
          'current_price' => Arr::get($item, 'current_price'),
          'market_cap' => Arr::get($item, 'market_cap'),
          'market_cap_rank' => Arr::get($item, 'market_cap_rank'),
          'fully_diluted_valuation' => Arr::get($item, 'fully_diluted_valuation'),
          'total_volume' => Arr::get($item, 'total_volume'),
          'high_24h' => Arr::get($item, 'high_24h'),
          'low_24h' => Arr::get($item, 'low_24h'),
          'price_change_24h' => Arr::get($item, 'price_change_24h'),
          'price_change_percentage_24h' => Arr::get($item, 'price_change_percentage_24h'),
          'market_cap_change_24h' => Arr::get($item, 'market_cap_change_24h'),
          'market_cap_change_percentage_24h' => Arr::get($item, 'market_cap_change_percentage_24h'),
          'circulating_supply' => Arr::get($item, 'circulating_supply'),
          'total_supply' => Arr::get($item, 'total_supply'),
          'max_supply' => Arr::get($item, 'max_supply'),
          'ath' => Arr::get($item, 'ath'),
          'ath_change_percentage' => Arr::get($item, 'ath_change_percentage'),
          'ath_date' => Carbon::parse(Arr::get($item, 'ath_date'))->format('Y-m-d H:m:s'),
          'atl' => Arr::get($item, 'atl'),
          'atl_change_percentage' => Arr::get($item, 'atl_change_percentage'),
          'atl_date' => Carbon::parse(Arr::get($item, 'atl_date'))->format('Y-m-d H:m:s'),
          // 'roi' => Arr::get($item, 'roi'),
          'last_updated' => Carbon::parse(Arr::get($item, 'last_updated'))->format('Y-m-d H:m:s')
        ]);
      }
    }
}
