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
    protected $signature = 'command:get-all-coins';

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
    public function handle()
    {
        $cryptos = CoingeckoAPI::getAllCoins();

        $bar = $this->output->createProgressBar(count($cryptos));
        $bar->start();

        foreach ($cryptos as $crypto) {
            Crypto::firstOrCreate([
                'api_id' => Arr::get($crypto, 'id'),
                'symbol' => Arr::get($crypto, 'symbol'),
                'name' => Arr::get($crypto, 'name'),
            ]);

            $bar->advance();
        }
    }
}
