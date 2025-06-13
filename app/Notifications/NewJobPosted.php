<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Events\PusherNotificationPrivateEvent;

class NewJobPosted extends Notification
{
    use Queueable;

    public $row; // ✅ Declare the property

    // ✅ Accept $job in the constructor
    public function __construct($row)
    {
        $this->job = $row;
    }

    public function via(object $notifiable): array
    {
        return ['mail', 'database']; // Or just ['mail']
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                ->subject('New Job Alert!')
                ->greeting('Hello ' . $notifiable->name . ',')
                ->line('A job that matches your profile has just been posted.')
                ->action('View Job', url('/job/' . $this->job->slug))
                ->line('Thanks for being with us!');
    }


    public function toDatabase($notifiable)
    {
        event(new PusherNotificationPrivateEvent($this->job->id, $this->job, $notifiable));
        return [
            'id' =>  $this->job->id,
            'for_admin' =>  0,
            'message' => 'A new job "' . $this->job->title . '" has been posted.',
            'url' => url('/job/' . $this->job->slug),
        ];
    }


    public function toArray(object $notifiable): array
    {
        return [
            'job_id' => $this->job->id,
            'job_title' => $this->job->title,
        ];
    }
}
