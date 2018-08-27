<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class KillsController extends Controller
{
    
    public function listAction(Request $request)
    {
        $this->datatable();
        return $this->render('kills/list.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
    
    private function datatable()
    {
    $datatable = $this->get('datatable');
    return $datatable->setEntity("AppBundle:Kills", "x")
                    ->setFields(
                            array(
                                "ID" => 'x.line',
                                "KILLER" => 'x.KILLER',
                                "KILL TIME" => 'x.KILLTIME',
                                "VICTIM" => 'x.VICTIM',
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

