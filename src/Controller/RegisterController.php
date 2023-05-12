<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\MailSender;
use Symfony\Component\Mime\Email;

class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
    public function index(MailSender $mailSender): Response
    {
        $email = new Email();
        $email->from('wp@wp.pl');

        $email->subject('Twoje konto zostało założone.');
        $email->text('Twoje konto zostało założone.');
        $email->html('<p>Twoje konto zostało założone.</p>');

        $mailSender->sendMail($email);

        return $this->render('register/index.html.twig', [
            'controller_name' => 'RegisterController'
        ]);
    }
}
