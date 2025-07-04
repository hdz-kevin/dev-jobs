<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewApplicant extends Notification
{
    use Queueable;

    public int $job_offer_id;

    public string $job_offer_title;

    public int $applicant_id;

    /**
     * Create a new notification instance.
     */
    public function __construct(int $job_offer_id, string $job_offer_title, int $applicant_id)
    {
        $this->job_offer_id = $job_offer_id;
        $this->job_offer_title = $job_offer_title;
        $this->applicant_id = $applicant_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url(route('notifications.index'));

        return (new MailMessage)
                    ->line('There is a new applicant for your job offer.')
                    ->line('Job Offer: '.$this->job_offer_title)
                    ->action('View Notifications', $url)
                    ->line('Thank you for using DevJobs!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [ ];
    }

    public function toDatabase(object $notifiable) {
        return [
            'job_offer_id' => $this->job_offer_id,
            'job_offer_title' => $this->job_offer_title,
            'applicant_id' => $this->applicant_id,
        ];
    }
}
