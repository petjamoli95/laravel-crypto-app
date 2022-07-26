<?php

namespace App\Jobs\Watchlist;

use App\Models\CryptoDetails;
use App\Models\User;
use Illuminate\Foundation\Bus\Dispatchable;

class WatchlistItem
{
    use Dispatchable;

    /**
     * @var User
     */
    private User $user;

    /**
     * @var CryptoDetails
     */
    private CryptoDetails $cryptoDetails;

    /**
     * @param  User  $user
     * @param  CryptoDetails  $cryptoDetails
     */
    public function __construct(User $user, CryptoDetails $cryptoDetails)
    {
        $this->user = $user;
        $this->cryptoDetails = $cryptoDetails;
    }

    /**
     * @return CryptoDetails
     */
    public function handle()
    {
        if ($this->cryptoDetails->watchlistedBy($this->user)) {
            return $this->cryptoDetails;
        }

        $this->cryptoDetails->users()->attach([
            'user_id' => $this->user->id,
        ]);

        return $this->cryptoDetails;
    }
}
