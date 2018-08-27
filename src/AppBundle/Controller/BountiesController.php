<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class BountiesController extends Controller
{
    
    public function listAction(Request $request)
    {
        $this->datatable();
        return $this->render('bounties/list.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
    
    private function datatable()
    {
    $datatable = $this->get('datatable');
    return $datatable->setEntity("AppBundle:Bounty", "x")
                    ->setFields(
                            array(
                                "ID" => 'x.line',
                                "BOUNTY" => 'x.BOUNTY',
                                "DEATHS" => 'x.DEATHS',
                                "KILLED BY" => 'x.KILLEDBY',
                                "KILLS" => 'x.KILLS',
                                "LAST KILL" => 'x.LASTKILL',
                                "NAME" => 'x.NAME',
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

