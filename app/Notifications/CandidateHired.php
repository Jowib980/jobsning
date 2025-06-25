<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Events\PusherNotificationPrivateEvent;

class CandidateHired extends Notification
{
    use Queueable;

    public $jobCandidate;

    public function __construct($jobCandidate)
    {
        $this->jobCandidate = $jobCandidate;
    }

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $job = $this->jobCandidate->jobInfo;
        $company = $this->jobCandidate->company;

        return (new MailMessage)
            ->subject('Hired!')
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line("You are hired by {$company->name} for the job: {$job->title} through jobsning.com.")
            ->action('View Job', url('/job/' . $job->slug))
            ->line('Thanks for being with us!');
    }

    public function toDatabase($notifiable)
    {
        $job = $this->jobCandidate->jobInfo;

        event(new PusherNotificationPrivateEvent($job->id, $job, $notifiable));

        return [
            'id' => $job->id,
            'for_admin' => 0,
            'message' => 'You have been hired for the job "' . $job->title . '".',
            'url' => url('/job/' . $job->slug),
        ];
    }

    public function toArray(object $notifiable): array
    {
        $job = $this->jobCandidate->jobInfo;

        return [
            'job_id' => $job->id,
            'job_title' => $job->title,
        ];
    }
}

