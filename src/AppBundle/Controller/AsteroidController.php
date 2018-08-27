<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class AsteroidController extends Controller
{
    
    public function listAction(Request $request)
    {
        $this->datatable();
        return $this->render('asteroid/list.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
    
    private function datatable()
    {
    $datatable = $this->get('datatable');
    return $datatable->setEntity("AppBundle:Asteroid", "x")
                    ->setFields(
                            array(
                                "ID" => 'x.line',
                                "CURRENT SECTOR" => 'x.CURRENTSECTOR',
                                "LAST POSITION" => 'x.LASTPOSITION',
                                "NAME" => 'x.NAME',
                                "Action" => "x.line",
                                "_identifier_" => "x.line"
                                )
                            
                    )
                    ->setRenderers(
                            array(
                                4 => array(
                                    'view' => 'actionasteroid.html.twig', // Path to the template
                                    'params' => array( // All the parameters you need (same as a twig template)
                                            'edit_route'    => 'admin_asteroids_details'
                                            
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
        
        $repository = $this->getDoctrine()->getRepository('AppBundle:Asteroid');


        $logs = $repository->findOneBy(
            array('line' => $line)
                );
        
                
        $shadow_path = $this->container->getParameter('path_to_shadow');
        
        if (!$logs)
        {
             throw $this->createNotFoundException('No asteroid found for id '.$line);
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
        
        return $this->render('asteroid/details.html.twig', array(
            'logs' => $logs,
        ));
        
    }
}
