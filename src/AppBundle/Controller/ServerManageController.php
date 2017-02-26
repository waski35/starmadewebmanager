<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ServerManageController extends Controller
{
    
    public function showAction(Request $request)
    {
        $do_action = $request->query->get('do_action');
        
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT p
            FROM AppBundle:ServerStatus p
            ORDER BY p.TIME DESC');
        $lastServerStatus = $query->setMaxResults(1)->getResult();
                
        $shadow_path = $this->container->getParameter('path_to_shadow');
            if ($do_action == 'stop')
            {
                if ($lastServerStatus->getFirst()->getStatus() != 'Stopped' || $lastServerStatus->getFirst()->getStatus() != 'Kill')
                {
                    // perform kill
                    exec($shadow_path."/shadow.dtsd stop");
                }
            }
            else if ($do_action == 'restart')
            {
                if ($lastServerStatus->getFirst()->getStatus() != 'Stopped' || $lastServerStatus->getFirst()->getStatus() != 'Kill')
                {
                    // perform restart
                    exec($shadow_path."/shadow.dtsd restart");
                    
                }
            }
            else if ($do_action == 'start')
            {
                if ($lastServerStatus->getFirst()->getStatus() != 'Starting')
                {
                    // perform start
                    exec($shadow_path."/shadow.dtsd start");
                    
                }
                
            }
            else if ($do_action == 'backupuni')
            {
                if ($lastServerStatus->getFirst()->getStatus() != 'Starting')
                {
                    // perform backup of universe
                    exec($shadow_path."/shadow.dtsd universebackup");
                    
                }
            }
            else if ($do_action == 'updatesrv')
            {
                if ($lastServerStatus->getFirst()->getStatus() != 'Starting')
                {
                    // perform update server binaries
                    exec($shadow_path."/shadow.dtsd download");
                }
            }
            else if ($do_action == 'updateshdw')
            {
                if ($lastServerStatus->getFirst()->getStatus() != 'Starting')
                {
                    // perform update shadow
                    exec($shadow_path."/shadow.dtsd updateshadow");
                    
                }
            }
          
        
        return $this->render('servermanage/show.html.twig', array(
            'serverstatus' => $lastServerStatus[0],
        ));
    }
}

