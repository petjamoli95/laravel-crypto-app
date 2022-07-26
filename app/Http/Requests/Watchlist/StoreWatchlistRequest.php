<?php

namespace App\Http\Requests\Watchlist;

use Illuminate\Foundation\Http\FormRequest;

class StoreWatchlistRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'api_id' => 'required|exists:cryptos,api_id',
        ];
    }
}
