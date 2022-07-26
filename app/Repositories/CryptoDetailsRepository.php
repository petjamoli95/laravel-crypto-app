<?php

namespace App\Repositories;

use App\Interfaces\CryptoDetailsInterface;
use App\Models\CryptoDetails;

class CryptoDetailsRepository implements CryptoDetailsInterface
{
    /**
     * @return mixed
     */
    public function top()
    {
        return CryptoDetails::orderBy('market_cap_rank')->paginate(100);
    }

    /**
     * @param $input
     * @return mixed
     */
    public function search($input)
    {
        return CryptoDetails::where('api_id', 'like', '%'.$input.'%')
            ->orWhere('name', 'like', '%'.$input.'%')
            ->orWhere('symbol', 'like', $input)
            ->get();
    }

    /**
     * @param $apiId
     * @return mixed
     */
    public function findByApiId($apiId)
    {
        return CryptoDetails::where('api_id', $apiId)->first();
    }
}
