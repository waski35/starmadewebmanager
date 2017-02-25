<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class serverSettingsController extends Controller
{
    /**
     * @Route("/admin/serversettings", name="admin_serversettings")
     */
    public function showAction(Request $request)
    {
        
        return $this->render('serversettings/show.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
}
