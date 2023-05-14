<?php

namespace App\Tests\Service\Notifier;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Mailer\MailerInterface;
use App\Service\Notifier\MailerNotifier;
use Symfony\Component\Mime\Email;

class MailerNotifierTest extends TestCase
{
    public function testSend(): void
    {
        $mailer = $this->createMock(MailerInterface::class);
        $mailer->expects($this->once())
            ->method('send');

        $email = $this->createMock(Email::class);
        $email->expects($this->once())
            ->method('subject');
        $email->expects($this->once())
            ->method('text');
        $email->expects($this->once())
            ->method('html');

        $mailerNotifier = new MailerNotifier($mailer);
        $this->assertNull($mailerNotifier->setMessage($email));
        $this->assertNull($mailerNotifier->send('title', 'message'));
    }
}
