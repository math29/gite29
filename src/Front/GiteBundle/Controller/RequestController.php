<?php

namespace Front\GiteBundle\Controller;

use Common\EntityBundle\Entity\Gite;
use Common\EntityBundle\Entity\InformationRequest;
use Common\EntityBundle\Entity\RentRequest;
use Common\EntityBundle\Form\InformationRequestType;
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

            $notificationGenerator = $this->get('common_mailer.notification');
            $notificationGenerator->sendRequestRentalNotification($gite->getOwner(), $rentRequest);

            return $this->redirectToRoute('home');
        }

        return $this->render('FrontGiteBundle:Request:rent_request.html.twig', array(
            'form' => $form->createView(),
            'gite' => $gite
        ));
    }

    /**
     * @Route("/informationRequest/{id}", name="information_request", requirements={"id": "\d+"})
     * @ParamConverter("gite", class="CommonEntityBundle:Gite")
     * @param Request $request
     * @param Gite $gite
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function sendNotification(Request $request, Gite $gite) {
        $informationRequest = new InformationRequest();
        $form = $this->createForm(InformationRequestType::class, $informationRequest);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $informationRequest->setGite($gite);
            $em->persist($informationRequest);
            $em->flush();

            $notificationGenerator = $this->get('common_mailer.notification');
            $notificationGenerator->sendInformationRequestNotification($gite->getOwner(), $informationRequest);

            return $this->redirectToRoute('home');
        }
        return $this->render('FrontGiteBundle:Request:information_request.html.twig', array(
            'form' => $form->createView(),
            'gite' => $gite
        ));
    }
}
