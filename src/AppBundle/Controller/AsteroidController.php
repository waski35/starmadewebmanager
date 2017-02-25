<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use LanKit\DatatablesBundle\Datatables\DataTable;

class AsteroidController extends Controller
{
    /**
     * @Route("/admin/asteroid", name="admin_asteroids")
     */
    public function listAction(Request $request)
    {
        
        return $this->render('asteroid/list.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
    
    public function listAjaxAction(Request $request)
    {
        $datatable = $this->get('lankit_datatables')->getDatatable('AppBundle:Asteroid');

    
        return $datatable->getSearchResults(Datatable::RESULT_JSON);
        
    }
}
