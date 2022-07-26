<?php

namespace App\Console\Commands;

use App\Events\Crypto\PriceChangePercentageThresholdMet;
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
    protected $signature = 'command:update-top-coin-details';

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
        $cryptoDetails = $coingecko_api->getTopCoinMarketData();

        $bar = $this->output->createProgressBar(count($cryptoDetails));
        $bar->start();
        foreach ($cryptoDetails as $item) {
            // If price change percentage over x amount, trigger an event to send an email to the user.

            // TODO: Make saving/updating this a job, and use in each place.
            $crypto = CryptoDetails::updateOrCreate(
                  ['api_id' => Arr::get($item, 'id')],
                  ['symbol' => Arr::get($item, 'symbol'),
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
                      'last_updated' => Carbon::parse(Arr::get($item, 'last_updated'))->format('Y-m-d H:m:s'), ]
            );

            $bar->advance();
            // TODO: CHeck this
            if (Arr::get($item, 'price_change_percentage_24h') > 0.5) {
                event(new PriceChangePercentageThresholdMet($item));
            }
        }
    }
}
