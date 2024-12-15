<?php

namespace App\Notifications;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewContactSubmission extends Notification
{
    use Queueable;

    public function __construct(protected Contact $contact)
    {
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Contact Form Submission')
            ->greeting('Hello!')
            ->line('A new contact form submission has been received.')
            ->line('Details:')
            ->line("Name: {$this->contact->first_name} {$this->contact->last_name}")
            ->line("Email: {$this->contact->email}")
            ->line("Phone: {$this->contact->phone}")
            ->when($this->contact->company_name, function ($message) {
                return $message->line("Company: {$this->contact->company_name}");
            })
            ->line("Message:")
            ->line($this->contact->message)
            ->action('View in Admin Panel', url('/admin/contacts/' . $this->contact->id));
    }
}
