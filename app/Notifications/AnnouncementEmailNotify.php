<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AnnouncementEmailNotify extends Notification
{
    use Queueable;

    public $annid;
    public $title;
    public $content;



    public function __construct($id, $title, $content)
    {
        $this->annid = $id;
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        // return ['database','mail'];
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->greeting("New Announcement is Coming!")
                    ->line($this->title)
                    ->line($this->content)
                    ->line('Thank you for using our application!')
                    ->action('Visit Site', url('/'));
    }

    // public function toArray(object $notifiable): array
    // {
    //     return [
    //         'annid' => $this->annid,
    //         'title' => $this->title,
    //         'content' => $this->content,
    //     ];
    // }

}

// php artisan make:notification AnnouncementEmailNotify




