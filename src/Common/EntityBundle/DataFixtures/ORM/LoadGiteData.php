<?php
namespace Common\EntityBundle\DataFixtures\ORM;

use Common\EntityBundle\Entity\Gite;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Http\Adapter\Guzzle6\Client;
use Http\Message\MessageFactory\GuzzleMessageFactory;
use Ivory\GoogleMap\Service\Base\Geometry;
use Ivory\GoogleMap\Service\Geocoder\GeocoderService;
use Ivory\GoogleMap\Service\Geocoder\Request\GeocoderAddressRequest;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadGiteData
    extends AbstractFixture
    implements OrderedFixtureInterface, ContainerAwareInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * Load data fixtures with the passed EntityManager
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $users = $manager->getRepository('CommonEntityBundle:User')->findAll();
        $user = $users[0];

        $gite = new Gite();
        $gite->setTitle('My beautiful gite');
        $gite->setDescription('This is my description');
        $gite->setOwner($user);
        $gite->setAddress('chateau de brest');
        $gite->setKind('HOUSE');
        $gite->setBedrooms(1);
        $gite->setSize(64);
        $gite->setCapacity(4);
        $gite->setBeds(2);
        $gite->setBathrooms(2);

        /* Get Latitude and longitude of given address */
        $geocoder = new GeocoderService(new Client(), new GuzzleMessageFactory());
        $request = new GeocoderAddressRequest($gite->getAddress());
        $results = $geocoder->geocode($request)->getResults();

        if(count($results) > 0) {
            $gite->setGeometry($results[0]->getGeometry());
        }

        $manager->persist($gite);
        $manager->flush();
    }

    /**
     * Sets the container.
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Get the order of this fixture
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }

}