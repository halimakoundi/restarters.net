<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AdminEditGroupNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
     public function __construct($arr, $user = null)
     {
         $this->arr = $arr;
         $this->user = $user;
     }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
     public function via($notifiable)
     {
         return ['mail', 'database'];
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
                   ->subject('Group Edited')
                   ->greeting('Hello!')
                   ->line('Group \'' . $this->arr['group_name'] . '\' has been edited.')
                   ->action('View group', $this->arr['group_url'])
                   ->line('If you think this invitation was not intended for you, please discard this email.');
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
           'title' => 'Group Edited:',
           'name' => $this->arr['group_name'],
           'url' => $this->arr['group_url'],
       ];
     }
}
