<?php

namespace Front\GiteBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RequestControllerTest extends WebTestCase
{
    public function testRentrequest()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/RentRequest');
    }

}
