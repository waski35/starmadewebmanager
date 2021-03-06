<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ShipController extends Controller
{
    
    public function listAction(Request $request)
    {
        $this->datatable();
        return $this->render('ship/list.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
    
    private function datatable()
    {
    $datatable = $this->get('datatable');
    return $datatable->setEntity("AppBundle:Ship", "x")
                    ->setFields(
                            array(
                                "ID" => 'x.line',
                                "ATTACHED" => 'x.ATTACHED',
                                "BLOCK" => 'x.BLOCK',
                                "CREATOR" => 'x.CREATOR',
                                "CURRENT SECTOR" => 'x.CURRENTSECTOR',
                                "DOCKED" => 'x.DOCKED',
                                "ENTITY TYPE" => 'x.ENTITYTYPE',
                                "FACTION" => 'x.FACTION',
                                "LAST CONTROLLER" => 'x.LASTCONTROLLER',
                                "LAST POSITION" => 'x.LASTPOSITION',
                                "LAST UPDATE" => 'x.LASTUPDATE',
                                "MASS" => 'x.MASS',
                                "NAME" => 'x.NAME',
                                "Action" => "x.line",
                                "_identifier_" => "x.line"
                                )
                            
                    )
                    ->setRenderers(
                            array(
                                13 => array(
                                    'view' => 'actionship.html.twig', // Path to the template
                                    'params' => array( // All the parameters you need (same as a twig template)
                                            'edit_route'    => 'admin_ships_details'
                                            
                                        ),
                                ),
                            )
                    )
                    ->setGlobalSearch(true);
    }
    
    public function listAjaxAction(Request $request)
    {
        return $this->datatable()->execute(); 
        
    }
    
    public function detailsAction(Request $request)
    {
        $line = $request->query->get('line');
        
        $repository = $this->getDoctrine()->getRepository('AppBundle:Ship');


        $logs = $repository->findOneBy(
            array('line' => $line)
                );
        
                
        $shadow_path = $this->container->getParameter('path_to_shadow');
        
        if (!$logs)
        {
             throw $this->createNotFoundException('No ship found for id '.$line);
        }
        if ($request->getRealMethod() == 'POST')
        {
            $do_action = $request->request->get('do_action');
            $logs_name = $logs->getName();
            if ($do_action == "Despawn")
            {
                // screen -p 0 -S smscreen -X stuff "$STUFFCOMMAND" -> w lokalnym wierszu polecen wyslac to to sreena dzlajacego na tym samym userze
                // perform despawn based off name
                exec('screen -p 0 -S smscreen -X stuff "/despawn_all \''.$logs_name.'\' all false"\'\n\'');
            }
            
        }
        
        return $this->render('ship/details.html.twig', array(
            'logs' => $logs,
        ));
        
    }
}

