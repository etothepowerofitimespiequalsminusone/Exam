<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AlbumLeak extends Notification
{
    use Queueable;

    private $leak;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($leak)
    {
        $this->leak = $leak;

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
                    ->subject('Album Updates!!!')
                    ->greeting('Hey there,')
                    ->line('MusicTracker has new activity')
                    ->action('See what is new', 'http://localhost:8000')
                    ->line('Lets wait for music together!');
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
