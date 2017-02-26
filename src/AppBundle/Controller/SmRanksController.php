<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use LanKit\DatatablesBundle\Datatables\DataTable;

class SmRanksController extends Controller
{
    
    public function listAction(Request $request)
    {
        
        return $this->render('smranks/list.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
    
    public function listAjaxAction(Request $request)
    {
        $datatable = $this->get('lankit_datatables')->getDatatable('AppBundle:SmRank');

    
        return $datatable->getSearchResults(Datatable::RESULT_JSON);
        
    }   
}

