<?php

namespace Front\GiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use Symfony\Component\HttpFoundation\Request;

use Common\EntityBundle\Entity\Gite,
    Common\EntityBundle\Form\GiteType;

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
        $form = $this->createForm(GiteType::class, $gite);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $gite = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($gite);
            $em->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('FrontGiteBundle:Page:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
