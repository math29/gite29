<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PropertyCatalogueSingleController extends Controller
{
    /**
     * @Route("/gite/{id}", name="property-catalogue-single")
     */
    public function indexAction($id)
    {
        return $this->render('FrontBundle:Page:property-catalogue-single.html.twig', array(
            "id" => $id
        ));
    }
}
