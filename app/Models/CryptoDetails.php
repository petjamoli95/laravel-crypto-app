<?php

namespace App\Models;

use App\Events\Crypto\PriceChangePercentageThresholdMet;
use App\Services\CoingeckoAPI;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CryptoDetails extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'api_id',
        'symbol',
        'name',
        'image',
        'current_price',
        'market_cap',
        'market_cap_rank',
        'fully_diluted_valuation',
        'total_volume',
        'high_24h',
        'low_24h',
        'price_change_24h',
        'price_change_percentage_24h',
        'market_cap_change_24h',
        'market_cap_change_percentage_24h',
        'circulating_supply',
        'total_supply',
        'max_supply',
        'ath',
        'ath_change_percentage',
        'ath_date',
        'atl',
        'atl_change_percentage',
        'atl_date',
        'last_updated',
    ];

    /**
     * @param  User  $user
     * @return mixed
     */
    public function watchlistedBy(User $user)
    {
        return $this->users->find($user->id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @return array
     */
    public function coingeckoData()
    {
        return CoingeckoAPI::getCoinData($this->api_id);
    }
}
