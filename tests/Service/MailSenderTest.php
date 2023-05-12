<?php

namespace App\Service\Tests;

use PHPUnit\Framework\TestCase;
use App\Service\MailSender;

use Symfony\Component\Mailer\MailerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mime\Email;

class MailSenderTest extends TestCase
{
    private MailerInterface $mailer;
    private LoggerInterface $logger;
    private Email $email;

    public function setUp(): void
    {
        $this->mailer = $this->createStub(MailerInterface::class);
        $this->logger = $this->createStub(LoggerInterface::class);
        $this->email = $this->createMock(Email::class);
    }

    public function testSendMail(): void
    {
        $mailSender = new MailSender($this->mailer, $this->logger, 'mariusz.madanowski@gmail.com');

        $this->assertInstanceOf(Email::class, $this->email);

        $result = $mailSender->sendMail($this->email);
    }
}
