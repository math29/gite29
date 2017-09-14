<?php

namespace Front\GiteBundle\Controller;

use Common\EntityBundle\Entity\Gite;
use Common\EntityBundle\Entity\RentRequest;
use Common\EntityBundle\Form\RentRequestType;
use Common\MailerBundle\Service\NotificationGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;

class RequestController extends Controller
{
    /**
     * @Route("/RentRequest/{id}", name="rent_a_gite_request", requirements={"id": "\d+"})
     * @ParamConverter("gite", class="CommonEntityBundle:Gite")
     * @param Request $request
     * @param Gite $gite
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function RentRequestAction(Request $request, Gite $gite)
    {
        $rentRequest = new RentRequest();
        $form = $this->createForm(RentRequestType::class, $rentRequest);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $rentRequest->setGite($gite);
            $em->persist($rentRequest);
            $em->flush();

            $notificationGenerator = $this->get(NotificationGenerator::class);
            $notificationGenerator->sendNotification();

            return $this->redirectToRoute('home'); // redirect when done
        }

        return $this->render('FrontGiteBundle:Request:rent_request.html.twig', array(
            'form' => $form->createView(),
            'gite' => $gite
        ));
    }

}
