<?php

namespace App\Console\Commands;

use App\Models\Crypto;
use App\Services\CoingeckoAPI;
use Illuminate\Console\Command;

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
        $crypto = Crypto::create([
          'api_id' => $item->id,
          'symbol' => $item->symbol,
          'name' => $item->name
        ]);
      }
    }
}
