<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mime\Email;

class MailSender
{
    private MailerInterface $mailer;
    private LoggerInterface $logger;
    private string $emailTo;

    public function __construct(
        MailerInterface $mailer,
        LoggerInterface $logger,
        string $emailTo
    )
    {
        $this->mailer = $mailer;
        $this->logger = $logger;
        $this->emailTo = $emailTo;
    }

    public function sendMail(Email $email): void
    {
        $email->to($this->emailTo);
        $result = $this->mailer->send($email);

        $result2 = $this->logger->info('Mail wysłany.');
        //dump($email, $result, $result2);die();
    }
}
