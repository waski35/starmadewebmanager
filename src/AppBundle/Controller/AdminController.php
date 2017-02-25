<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Player;
use AppBundle\Entity\DestroyLog;
use AppBundle\Entity\Vote;


class AdminController extends Controller
{
    /**
     * @Route("/admin, name="admin_index")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $dl_query = $em->createQuery(
            'SELECT dl
                FROM AppBundle:DestroyLog dl
                ORDER BY dl.DESTROYTIME DESC');

        $destroyLogs = $dl_query->setMaxResults(10)->getResult();
        
        $p_query = $em->createQuery(
            'SELECT p
                FROM AppBundle:Player p
                WHERE p.RANK = "Admiral"
                ORDER BY p.LASTUPDATE DESC');
        $lastAdmin = $p_query->setMaxResults(1)->getResult();
            
            
            
            $dateMonthAgo = date('Y-m-d', strtotime('-30 days'));
            $dateToday = date('Y-m-d');
            
        $v_query = $em->createQuery(
            'SELECT v
                FROM AppBundle:Vote v
                WHERE v.TIME > "'.$dateMonthAgo.'"
                ORDER BY v.TIME DESC');

        $votesLastMonth = $v_query->getResult();    
            
        
        $pl_query = $em->createQuery(
            'SELECT pl
                FROM AppBundle:Player pl
                WHERE pl.LASTUPDATE > "'.$dateMonthAgo.'"
                ORDER BY p.LASTUPDATE DESC');
        $playersLastMonth = $pl_query->getResult();
        
        
                
           
        return $this->render('admin/index.html.twig', array(
            'destroylog' => $destroyLogs,
            'lastadmin' => $lastAdmin,
            'votes' => $votesLastMonth->count(),
            'playersCount' => $playersLastMonth->count(),
            'uptime' => '100% - test value',
        ));
    }
}

