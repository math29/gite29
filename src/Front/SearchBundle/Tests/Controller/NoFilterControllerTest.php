<?php

namespace Front\SearchBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class NoFilterControllerTest extends WebTestCase
{
    public function testDisplayall()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/displayAll');
    }

}
