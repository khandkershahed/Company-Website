<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DealRegister extends Notification
{
    use Queueable;
    public $name;
    public $rfq_code;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name , $rfq_code)
    {
        $this->name = $name;
        $this->rfq_code = $rfq_code;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('The introduction to the notification.')
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
            'name' => $this->name,
            'link'=> route('admin.single-rfq.show',$this->rfq_code),
            'message1' => 'has registered ',
            'message2'=> 'a new Deal. '.$this->rfq_code.' Need to create SAS',
        ];
    }
}
