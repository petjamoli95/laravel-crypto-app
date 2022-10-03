<?php

namespace App\Jobs\Crypto;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class GetTopCoinMarketData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            return Http::get(sprintf('%s/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=250&page=1&sparkline=false', config('coingecko.url')))->json();
        } catch (\Exception $e) {
            return [];
        }
    }
}
