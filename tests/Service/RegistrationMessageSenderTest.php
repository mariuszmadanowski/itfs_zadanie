<?php

namespace App\Tests\Service;

use PHPUnit\Framework\TestCase;
use App\Service\RegistrationMessageSender;

use App\Service\Notifier\MailerNotifier;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mime\Email;

class RegistrationMessageSenderTest extends TestCase
{
    private MailerNotifier $notifier;
    private LoggerInterface $logger;
    private Email $email;

    public function setUp(): void
    {
        $this->email = $this->createMock(Email::class);

        $this->notifier = $this->createMock(MailerNotifier::class);
        $this->notifier->expects($this->once())
            ->method('setMessage');
        $this->notifier->expects($this->once())
            ->method('send');

        $this->logger = $this->createStub(LoggerInterface::class);
        $this->logger->expects($this->once())
            ->method('info');
    }

    public function testSend(): void
    {
        $registrationMessageSender = new RegistrationMessageSender($this->notifier, $this->logger);

        $this->assertInstanceOf(Email::class, $this->email);

        $this->assertNull($registrationMessageSender->setMessage($this->email));
        $this->assertNull($registrationMessageSender->send());
    }
}
