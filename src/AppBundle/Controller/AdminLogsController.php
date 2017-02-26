<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class AdminLogsController extends Controller
{
   
    public function listAction(Request $request)
    {
        $this->datatable();
        return $this->render('adminlogs/list.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
    
    private function datatable()
    {
    $datatable = $this->get('datatable');
    return $datatable->setEntity("AppBundle:AdminLogs", "x")
                    ->setFields(
                            array(
                                "ID" => 'x.line',
                                "COMMAND" => 'x.COMMAND',
                                "NAME" => 'x.NAME',
                                "TIME" => 'x.TIME',
                                "_identifier_" => "x.line"
                                )
                            
                    )
                    ->setGlobalSearch(true);
    }
    
    public function listAjaxAction(Request $request)
    {
        return $this->datatable()->execute();
        
    }   
}
