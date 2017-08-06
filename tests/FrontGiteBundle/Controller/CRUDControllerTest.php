<?php

namespace Front\GiteBundle\Tests\Controller;

use Common\EntityBundle\DataFixtures\ORM\LoadGiteData;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Console\Input\StringInput;

class CRUDControllerTest extends WebTestCase
{
    private $entityManager;

//    public function setUp() {
//        $client = static::createClient();
//        $container = $client->getContainer();
//        $doctrine = $container->get('doctrine');
//        $this->entityManager = $doctrine->getManager();
//
//        $giteFixtures = new LoadGiteData();
//        $giteFixtures->load($this->entityManager);
//    }
    private static $application;

    protected function setUp()
    {
        $client = static::createClient();
        $container = $client->getContainer();
        $doctrine = $container->get('doctrine');
        $this->entityManager = $doctrine->getManager();

        self::runCommand('doctrine:database:create');
        self::runCommand('doctrine:schema:update --force');
        self::runCommand('doctrine:fixtures:load --no-interaction ');
    }

    protected static function runCommand($command)
    {
        $command = sprintf('%s --quiet', $command);

        return self::getApplication()->run(new StringInput($command));
    }

    protected static function getApplication()
    {
        if (null === self::$application) {
            $client = static::createClient();

            self::$application = new Application($client->getKernel());
            self::$application->setAutoExit(false);
        }

        return self::$application;
    }

    public function testGetAction()
    {
        $gites = $this->entityManager->getRepository('CommonEntityBundle:Gite')->findAll();
        $gite = $gites[0];
        var_dump(count($gites));

        $client = static::createClient();

        $crawler = $client->request('GET', '/'.$gite->getId());
        var_dump($client->getResponse()->getContent());
        $this->assertContains('06 31 06 72 82', $client->getResponse()->getContent());
    }

    public function testNewAction()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/new-gite');

        $this->assertContains('Etapes', $client->getResponse()->getContent());
    }
}
