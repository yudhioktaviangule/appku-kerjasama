<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BerkasDibuatNotification extends Notification
{
    use Queueable;
    private $content;
    public function __construct($content)
    {
        $this->content=$content;
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
                    ->line('Kepada Yang terhormat Bapak/Ibu.'.$this->content['_user']->name)
                    ->line('Diberitahukan bahwa '.$this->content['dokumen']->getPenanggungJawab()->getPerusahaan()->getUser()->name." telah mengirim berkas")
                    ->line("Perihal".$this->content['dokumen']->tentang)
                    ->action('Notification Action', url('/'))
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
