<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\RegistrationMessageSender;
use Symfony\Component\Mime\Email;

class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
    public function index(RegistrationMessageSender $registrationMessageSender): Response
    {
        $message = new Email();
        $message->from('wp@wp.pl'); // mail może pochodzić z konfiguracji, formularza, bazy danych
        $message->to('mariusz.madanowski@gmail.com'); // mail może pochodzić z konfiguracji, formularza, bazy danych

        try {
          $registrationMessageSender->setMessage($message);
          $registrationMessageSender->send();
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $this->render('register/index.html.twig', [
            'controller_name' => 'RegisterController'
        ]);
    }
}
