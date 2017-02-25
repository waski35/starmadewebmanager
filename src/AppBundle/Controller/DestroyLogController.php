<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use LanKit\DatatablesBundle\Datatables\DataTable;

class DestroyLogController extends Controller
{
    /**
     * @Route("/admin/destroylog", name="Admin_destroylogs")
     */
    public function listAction(Request $request)
    {
        
        return $this->render('destroylog/list.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
    
    public function listAjaxAction(Request $request)
    {
        $datatable = $this->get('lankit_datatables')->getDatatable('AppBundle:DestroyLog');

    
        return $datatable->getSearchResults(Datatable::RESULT_JSON);
        
    }
}

