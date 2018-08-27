<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DestroyLogController extends Controller
{
    
    public function listAction(Request $request)
    {
        $this->datatable();
        return $this->render('destroylog/list.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
    
    private function datatable()
    {
    $datatable = $this->get('datatable');
    return $datatable->setEntity("AppBundle:DestroyLog", "x")
                    ->setFields(
                            array(
                                "ID" => 'x.line',
                                "TYPE" => 'x.TYPE',
                                "NAME" => 'x.NAME',
                                "DESTROY TIME" => 'x.DESTROYTIME',
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

