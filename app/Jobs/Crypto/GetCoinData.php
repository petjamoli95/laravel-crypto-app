<?php

namespace App\Jobs\Crypto;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class GetCoinData implements ShouldQueue
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
            $cryptoDetails = Http::get(sprintf('%s/coins/markets?vs_currency=usd&ids=%s&order=market_cap_desc&per_page=1&page=1&sparkline=false', config('coingecko.url'), $id))->json();
            $cryptoDetails = Arr::get($cryptoDetails, 0);
        } catch (\Exception $e) {
            return [];
        }
    }
}
