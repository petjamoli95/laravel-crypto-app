<?php

namespace App\Events\Crypto;

use App\Models\CryptoDetails;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PriceChangePercentageThresholdMet
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var CryptoDetails
     */
    private CryptoDetails $cryptoDetails;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(CryptoDetails $cryptoDetails)
    {
        $this->cryptoDetails = $cryptoDetails;
    }

    /**
     * @return CryptoDetails
     */
    public function getCryptoDetails(): CryptoDetails
    {
        return $this->cryptoDetails;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
