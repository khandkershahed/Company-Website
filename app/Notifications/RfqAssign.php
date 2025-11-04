<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RfqAssign extends Notification
{
    use Queueable;
    public $name1;
    public $name2;
    public $name3;
    public $rfq_code;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name1,$name2,$name3, $rfq_code)
    {
        $this->name1 = $name1;
        $this->name2 = $name2;
        $this->name3 = $name3;
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
            'name' => 'Site Admin ',
            'link'=> route('admin.single-rfq.show',$this->rfq_code),
            'message1' => 'has assigned this ',
            'message2'=> $this->rfq_code.' to '.$this->name1.', '.$this->name2.', '. $this->name3.'. Check it',
        ];
    }
}
