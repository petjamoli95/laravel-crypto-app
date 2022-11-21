<?php

namespace App\Listeners\Crypto;

use App\Events\Cyrpto\PriceChangePercentageThresholdMet;
use App\Notifications\Crypto\PriceChangePercentageThresholdMetNotification;

class SendPriceChangePercentageThresholdMetNotifications
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(PriceChangePercentageThresholdMet $event)
    {
        foreach ($users as $user) {
            $user->notify(new PriceChangePercentageThresholdMetNotification($event->getCryptoDetails()));
        }
    }
}
