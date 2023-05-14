<?php

namespace App\Service\Notifier;

interface NotifierInterface
{
    public function send(string $title, string $message);
}
