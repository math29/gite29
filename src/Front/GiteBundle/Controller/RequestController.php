<?php

namespace Front\GiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RequestController extends Controller
{
    /**
     * @Route("/RentRequest")
     */
    public function RentRequestAction()
    {
        return $this->render('FrontGiteBundle:Request:rent_request.html.twig', array(
            // ...
        ));
    }

}
