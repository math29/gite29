<?php

namespace Front\GiteBundle\Tests\Controller;

use Common\EntityBundle\DataFixtures\ORM\LoadGiteData;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CRUDControllerTest extends WebTestCase
{
    private $entityManager;

    public function setUp() {
        $client = static::createClient();
        $container = $client->getContainer();
        $doctrine = $container->get('doctrine');
        $this->entityManager = $doctrine->getManager();

//        $giteFixtures = new LoadGiteData();
//        $giteFixtures->load($this->entityManager);
    }

    public function testGetAction()
    {
        $gites = $this->entityManager->getRepository('CommonEntityBundle:Gite')->findAll();
        $gite = $gites[0];

        $client = static::createClient();

        $crawler = $client->request('GET', '/'.$gite->getId());
        var_dump(count($gites));
//        var_dump($client->getResponse()->getContent());
        $this->assertContains('06 31 06 72 82', $client->getResponse()->getContent());
    }

    public function testNewAction()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/new-gite');

        $this->assertContains('Etapes', $client->getResponse()->getContent());
    }
}
