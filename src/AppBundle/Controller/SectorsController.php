<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class SectorsController extends Controller
{
    
    public function listAction(Request $request)
    {
        $this->datatable();
        return $this->render('sectors/list.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
    
    private function datatable()
    {
    $datatable = $this->get('datatable');
    return $datatable->setEntity("AppBundle:Sector", "x")
                    ->setFields(
                            array(
                                "ID" => 'x.line',
                                "LASTUPDATE" => 'x.LASTUPDATE',
                                "NAME" => 'x.NAME',
                                "PEACE" => 'x.PEACE',
                                "PROTECTED" => 'x.PROTECTED',
                                "TYPE" => 'x.TYPE',
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

