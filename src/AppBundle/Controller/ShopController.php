<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ShopController extends Controller
{
    
    public function listAction(Request $request)
    {
        $this->datatable();
        return $this->render('shop/list.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
    
    private function datatable()
    {
    $datatable = $this->get('datatable');
    return $datatable->setEntity("AppBundle:Shop", "x")
                    ->setFields(
                            array(
                                "ID" => 'x.line',
                                "CURRENT SECTOR" => 'x.CURRENTSECTOR',
                                "NAME" => 'x.NAME',
                                "Action" => "x.line",
                                "_identifier_" => "x.line"
                                )
                            
                    )
                    ->setRenderers(
                            array(
                                3 => array(
                                    'view' => 'actionshop.html.twig', // Path to the template
                                    'params' => array( // All the parameters you need (same as a twig template)
                                            'edit_route'    => 'admin_shops_details'
                                            
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
        
        $repository = $this->getDoctrine()->getRepository('AppBundle:Shop');


        $logs = $repository->findOneBy(
            array('line' => $line)
                );
        
                
        $shadow_path = $this->container->getParameter('path_to_shadow');
        
        if (!$logs)
        {
             throw $this->createNotFoundException('No shop found for id '.$line);
        }
        if ($request->getRealMethod() == 'POST')
        {
            $do_action = $request->request->get('do_action');
            $logs_name = $logs->getName();
            if ($do_action == "Despawn")
            {
                // perform action based off name
                exec($shadow_path.'/shadow.dtsd dosafe "/destroy_uid ENTITY_SHOP_'.$logs_name.'"');
            }
            else if ($do_action == "Restock Full")
            {
                exec($shadow_path.'/shadow.dtsd dosafe "/shop_restock_full_uid ENTITY_SHOP_'.$logs_name.'"');
                
            }
            else 
            {
                // do nothing
            }
            
        }
        
        return $this->render('shop/details.html.twig', array(
            'logs' => $logs,
        ));
        
    }
    
}

