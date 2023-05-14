<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegisterControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/register');

        $this->assertResponseIsSuccessful();
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertSelectorTextContains('h1', 'Hello RegisterController!');

        $this->assertEmailCount(1);

        $email = $this->getMailerMessage(0);
        $this->assertEmailHeaderSame($email, 'To', 'mariusz.madanowski@gmail.com');
        $this->assertEmailHeaderSame($email, 'From', 'wp@wp.pl');
        $this->assertEmailTextBodyContains($email, 'Twoje konto zostało założone.');
        $this->assertEmailAttachmentCount($email, 0);
    }
}
