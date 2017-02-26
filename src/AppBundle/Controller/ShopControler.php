<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use LanKit\DatatablesBundle\Datatables\DataTable;

class ShopController extends Controller
{
    
    public function listAction(Request $request)
    {
        
        return $this->render('shop/list.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
    
    public function listAjaxAction(Request $request)
    {
        $datatable = $this->get('lankit_datatables')->getDatatable('AppBundle:Shop');

    
        return $datatable->getSearchResults(Datatable::RESULT_JSON);
        
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

