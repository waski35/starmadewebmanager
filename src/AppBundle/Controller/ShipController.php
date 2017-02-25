<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use LanKit\DatatablesBundle\Datatables\DataTable;

class ShipController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function listAction(Request $request)
    {
        
        return $this->render('ship/list.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
    
    public function listAjaxAction(Request $request)
    {
        $datatable = $this->get('lankit_datatables')->getDatatable('AppBundle:Ship');

    
        return $datatable->getSearchResults(Datatable::RESULT_JSON);
        
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

