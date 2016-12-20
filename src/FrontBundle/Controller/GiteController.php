<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use Symfony\Component\HttpFoundation\Request;

use Common\EntityBundle\Entity\Gite,
    Common\EntityBundle\Form\GiteType;

class GiteController extends Controller
{
    /**
     * @Route("/gite/{id}", name="property-catalogue-single")
     * @ParamConverter("gite", class="CommonEntityBundle:Gite")
     */
    public function indexAction($id)
    {
        return $this->render('FrontBundle:Page:property-catalogue-single.html.twig', array(
            "id" => $id
        ));
    }

    /**
     * @Route("/new-gite", name="new-property")
     */
    public function newAction(Request $request)
    {
        $gite = new Gite();
        $gite->setArea(1);
        $form = $this->createForm(GiteType::class, $gite);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $gite = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($gite);
            $em->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('FrontBundle:Page:newGite.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
