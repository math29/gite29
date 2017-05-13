<?php

namespace Front\GiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use Symfony\Component\HttpFoundation\Request;

use Common\EntityBundle\Entity\Gite;

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

        if ($form->isSubmitted() && $form->isValid()) {
            $flow->saveCurrentStepData($form);

            if ($flow->nextStep()) {
                // form for the next step
                $form = $flow->createForm();
            } else {
                // flow finished
                // $gite = $form->getData();
                $gite->setOwner($user);

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
