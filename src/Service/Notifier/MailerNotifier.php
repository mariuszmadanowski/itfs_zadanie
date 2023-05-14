<?php

namespace App\Service\Notifier;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailerNotifier implements NotifierInterface, MailerNotifierInterface
{
    private MailerInterface $mailer;
    private Email $message;

    public function __construct(
        MailerInterface $mailer
    )
    {
        $this->mailer = $mailer;
    }

    public function setMessage(Email $message): void
    {
        $this->message = $message;
    }

    public function send(string $title, string $message): void
    {
        $this->message->subject($title);
        $this->message->text($message);
        $this->message->html('<p>' . $message . '</p>');

        $this->mailer->send($this->message);
    }
}
