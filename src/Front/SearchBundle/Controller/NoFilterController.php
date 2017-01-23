<?php

namespace Front\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Common\EntityBundle\Entity\Gite;

class NoFilterController extends Controller
{
    /**
     * @Route("/displayAll", name="search_display_all")
     */
    public function displayAllAction()
    {
        $repository = $this->getDoctrine()->getRepository('CommonEntityBundle:Gite');
        $gites = $repository->findAll();

        return $this->render('FrontSearchBundle:NoFilter:display_all.html.twig', array(
            "gites" => $gites
        ));
    }

}
