<?php

namespace App\Jobs\Crypto;

use App\Models\CryptoDetails;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class CreateUpdateCryptoDetails implements ShouldQueue
{
    use Dispatchable;

    /**
     * @var CryptoDetails
     */
    private CryptoDetails $cryptoDetails;

    /**
     * @param CryptoDetails $cryptoDetails
     */
    public function __construct(CryptoDetails $cryptoDetails, $id)
    {
        $this->cryptoDetails = $cryptoDetails;
        $this->id = $id;
    }

    /**
     * @return array
     */
    public function handle()
    {
        try {
            $this->cryptoDetails = Http::get(sprintf('%s/coins/markets?vs_currency=usd&ids=%s&order=market_cap_desc&per_page=1&page=1&sparkline=false', config('coingecko.url'), $this->id))->json();
            $this->cryptoDetails = Arr::get($this->cryptoDetails, 0);
        } catch (\Exception $e) {
            return [];
        }

        return CryptoDetails::updateOrCreate(
            [
                'api_id' => Arr::get($this->cryptoDetails, 'id'),
            ],
            array_merge($this->cryptoDetails, [
                'ath_date' => Carbon::parse(Arr::get($this->cryptoDetails, 'ath_date'))->format('Y-m-d H:m:s'),
                'atl_date' => Carbon::parse(Arr::get($this->cryptoDetails, 'atl_date'))->format('Y-m-d H:m:s'),
                'last_updated' => Carbon::parse(Arr::get($this->cryptoDetails, 'last_updated'))->format('Y-m-d H:m:s'),
            ])
        );
    }
}
