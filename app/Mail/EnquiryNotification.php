<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnquiryNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $subjectLine,
        public string $messageBody,
        public ?string $replyToEmail = null,
        public ?string $replyToName = null,
    ) {}

    public function build(): self
    {
        $mail = $this->subject($this->subjectLine)
            ->text('emails.enquiry-notification', ['messageBody' => $this->messageBody]);

        if ($this->replyToEmail !== null) {
            $mail->replyTo($this->replyToEmail, $this->replyToName);
        }

        return $mail;
    }
}
