<?php

namespace App\Console\Commands;

use App\Models\Crypto;
use App\Services\CoingeckoAPI;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class GetAllCoinsFromApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getallcoins';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inserts the id, symbol and name of all coins from the CoingeckoAPI';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(CoingeckoAPI $coingecko_api)
    {
      $response = $coingecko_api->getAllCoins();

      foreach ($response as $item)
      {
        $crypto = Crypto::firstOrCreate([
          'api_id' => Arr::get($item, 'id'),
          'symbol' => Arr::get($item, 'symbol'),
          'name' => Arr::get($item, 'name')
        ]);
      }
    }
}
