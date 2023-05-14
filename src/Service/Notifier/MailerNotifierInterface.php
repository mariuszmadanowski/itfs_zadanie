<?php

namespace App\Service\Notifier;

use Symfony\Component\Mime\Email;

interface MailerNotifierInterface
{
    public function setMessage(Email $message);
}
