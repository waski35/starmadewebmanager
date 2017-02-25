<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ServerStatusController extends Controller
{
    /**
     * @Route("/admin/serverstatus", name="admin_serverstatus")
     */
    public function showAction(Request $request)
    {
        
        return $this->render('serverstatus/show.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
}

