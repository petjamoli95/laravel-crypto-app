<?php

namespace App\Http\Requests\Watchlist;

use Illuminate\Foundation\Http\FormRequest;

class DestroyWatchlistRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'api_id' => 'required|exists:crypto_details,api_id',
        ];
    }
}
