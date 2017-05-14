<?php

namespace Front\GiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use Symfony\Component\HttpFoundation\Request;

use Common\EntityBundle\Entity\Gite;

use Ivory\GoogleMap\Service\Geocoder\GeocoderService;
use Http\Adapter\Guzzle6\Client;
use Http\Message\MessageFactory\GuzzleMessageFactory;
use Ivory\GoogleMap\Service\Geocoder\Request\GeocoderAddressRequest;


class DefaultController extends Controller
{
    /**
     * @Route("/{id}", name="property-gite-single", requirements={"id": "\d+"})
     * @ParamConverter("gite", class="CommonEntityBundle:Gite")
     */
    public function indexAction($gite)
    {
        return $this->render('FrontGiteBundle:Page:show.html.twig', array(
            "gite" => $gite
        ));
    }

    /**
     * @Route("/new-gite", name="new-property")
     */
    public function newAction(Request $request)
    {
        $gite = new Gite();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $flow = $this->get('common.form.flow.create_gite');
        $flow->bind($gite);

        $form = $flow->createForm();

        $form->handleRequest($request);

        /* Google maps */
//        $map = new Map();
//        $map->setCenter(new Coordinate(48.282684, -4.074548));
//        $map->setMapOption('zoom', 9);
//
//        $map->setStylesheetOptions(array(
//            'width'  => '800px',
//            'height' => '400px',
//        ));



        if ($form->isSubmitted() && $form->isValid()) {
            $flow->saveCurrentStepData($form);

            if ($flow->nextStep()) {
                // form for the next step
                $form = $flow->createForm();
            } else {
                // flow finished
                $gite = $form->getData();
                $gite->setOwner($user);

                /* Get Latitude and longitude of given address */
                $geocoder = new GeocoderService(new Client(), new GuzzleMessageFactory());
                $request = new GeocoderAddressRequest($gite->getAddress());
                $results = $geocoder->geocode($request)->getResults();

                if(count($results) > 0) {
                    $gite->setGeometry($results[0]->getGeometry());
                }

                $em = $this->getDoctrine()->getManager();
                $em->persist($gite);
                $em->flush();

                $flow->reset(); // remove step data from the session

                return $this->redirectToRoute('home'); // redirect when done
            }
        }

        return $this->render('FrontGiteBundle:Page:new.html.twig', array(
            'form' => $form->createView(),
            'flow' => $flow
        ));
    }
}
