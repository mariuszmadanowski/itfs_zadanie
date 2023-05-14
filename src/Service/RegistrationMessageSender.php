<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
use App\Service\Notifier\NotifierInterface;

class RegistrationMessageSender
{
    private NotifierInterface $notifier;
    private LoggerInterface $logger;

    public function __construct(
        NotifierInterface $notifier,
        LoggerInterface $logger
    )
    {
        $this->notifier = $notifier;
        $this->logger = $logger;
    }

    public function setMessage(\Serializable $message): void
    {
        $this->notifier->setMessage($message);
    }

    public function send(): void
    {
        $this->notifier->send('Potwierdzenie założenia konta.', 'Twoje konto zostało założone.');

        $this->logger->info('Mail wysłany.');
    }
}
