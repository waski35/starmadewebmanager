<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ServerSettingsController extends Controller
{
    
    public function showAction(Request $request)
    {
        $shadow_path = $this->container->getParameter('path_to_shadow');
        $instance_name = $this->container->getParameter('SM_SRV_instance_name');
        $instance_port = $this->container->getParameter('SM_SRV_instance_port');
        $instance_host = $this->container->getParameter('SM_SRV_instance_host');
        

        return $this->render('serversettings/show.html.twig', array(
            'shadow' => $shadow_path,
            'instance_name' => $instance_name,
            'instance_port' => $instance_port,
            'instance_host' => $instance_host,
        ));
    }
}
