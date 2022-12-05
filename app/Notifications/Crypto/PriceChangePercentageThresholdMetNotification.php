<?php

namespace App\Notifications\Crypto;

use App\Models\CryptoDetails;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PriceChangePercentageThresholdMetNotification extends Notification
{
    use Queueable;

    /**
     * @var CryptoDetails
     */
    private CryptoDetails $cryptoDetails;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(CryptoDetails $cryptoDetails)
    {
        $this->cryptoDetails = $cryptoDetails;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Hello.')
                    ->line("This is a notification informing you that {$this->cryptoDetails->name} on your watchlist has had a %{$this->cryptoDetails->price_change_percentage_24h} in the last 24 hours.")
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
