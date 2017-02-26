<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Player;

class PlayerController extends Controller
{
    
    public function listAction(Request $request)
    {
        $this->datatable();   
        return $this->render('player/list.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
    
    private function datatable()
    {
    $datatable = $this->get('datatable');
    return $datatable->setEntity("AppBundle:Player", "x")
                    ->setFields(
                            array(
                                "ID" => 'x.line',
                                "Bank Credits" => 'x.BANKCREDITS',
                                "CONTROLLING" => 'x.CONTROLLING',
                                "CONTROLTYPE" => 'x.CONTROLTYPE',
                                "CREDITS" => 'x.CREDITS',
                                "CURRENTIP" => 'x.CURRENTIP',
                                "CURRENTSECTOR" => 'x.CURRENTSECTOR',
                                "FACTION" => 'x.FACTION',
                                "LASTCORE" => 'x.LASTCORE',
                                "LASTPOSITION" => 'x.LASTPOSITION',
                                "LASTUPDATE" => 'x.LASTUPDATE',
                                "NAME" => 'x.NAME',
                                "ONLINE" => 'x.ONLINE',
                                "RANK" => 'x.RANK',
                                "_identifier_" => "x.line"
                                )
                    )
                    ->setRenderers(
                            array(
                                13 => array(
                                    'view' => 'AppBundle:Player:_action_player.html.twig', // Path to the template
                                    'params' => array( // All the parameters you need (same as a twig template)
                                            'edit_route'    => 'admin_players_details'
                                            
                                        ),
                                ),
                            )
                    )
                    ->setGlobalSearch(true);
    }
    
    public function listAjaxAction(Request $request)
    {
        return $this->datatable()->execute();  
        
    }
    
    public function detailsAction(Request $request)
    {
        $line = $request->query->get('line');
        
        $repository = $this->getDoctrine()->getRepository('AppBundle:Player');


        $logs = $repository->findOneBy(
            array('line' => $line)
                );
        
                
        $shadow_path = $this->container->getParameter('path_to_shadow');
        
        if (!$logs)
        {
             throw $this->createNotFoundException('No asteroid found for id '.$line);
        }
        if ($request->getRealMethod() == 'POST')
        {
            $do_action = $request->request->get('do_action');
            $logs_name = $logs->getName();
            if ($do_action == "Kill")
            {
                // perform action based off name
                exec($shadow_path.'/shadow.dtsd dosafe "/kill_character '.$logs_name.'"');
                //exec("screen -p 0 -S smscreen -X stuff '/kill_character ".$logs_name."'"); // -> w lokalnym wierszu polecen wyslac to to sreena dzlajacego na tym samym userze
                
            }
            else if ($do_action == 'Ban')
            {
                exec($shadow_path.'/shadow.dtsd dosafe "/ban_account_by_playername '.$logs_name.'"');
                //exec("screen -p 0 -S smscreen -X stuff '/ban_account_by_playername ".$logs_name."'");
                
            }
            else if ($do_action == 'Kick')
            {
                exec($shadow_path.'/shadow.dtsd dosafe "/kick_reason '.$logs_name. ' kick"');
                //exec("screen -p 0 -S smscreen -X stuff '/kick_reason ".$logs_name."'");
            }
            else if ($do_action == 'Save')
            {
                $newRank = $request->request->get('rank');
                
                if (in_array($newRank, $this->getRanks()))
                {
                    exec($shadow_path.'/shadow.dtsd changerank '.$logs_name. ' '.$newRank);
                }
            }
            else if ($do_action == 'Give Credits')
            {
                exec($shadow_path.'/shadow.dtsd dosafe "/give_credits '.$logs_name. ' 1000000"');
                //exec("screen -p 0 -S smscreen -X stuff '/give_credits ".$logs_name." 1000000'");
            }
            else if ($do_action == 'Set Invincible')
            {
                exec($shadow_path.'/shadow.dtsd dosafe "/god_mode '.$logs_name. ' true"');
                //exec("screen -p 0 -S smscreen -X stuff '/give_credits ".$logs_name." 1000000'");
            }
            else if ($do_action == 'UnSet Invincible')
            {
                exec($shadow_path.'/shadow.dtsd dosafe "/god_mode '.$logs_name. ' false"');
                //exec("screen -p 0 -S smscreen -X stuff '/give_credits ".$logs_name." 1000000'");
            }
            else if ($do_action == 'Whitelist')
            {
                exec($shadow_path.'/shadow.dtsd dosafe "/whitelist_name '.$logs_name.'"');
                //exec("screen -p 0 -S smscreen -X stuff '/give_credits ".$logs_name." 1000000'");
            }
            else if ($do_action == 'Unban')
            {
                exec($shadow_path.'/shadow.dtsd dosafe "/unban_account '.$logs_name.'"');
                //exec("screen -p 0 -S smscreen -X stuff '/give_credits ".$logs_name." 1000000'");
            }
            else 
            {
                // do nothing
            }
            
            $logs = $repository->findOneBy(
            array('line' => $line)
                );
            
        }
        
        return $this->render('player/details.html.twig', array(
            'logs' => $logs,
            'ranks' => $this->getRanks(),
        ));
        
    }
    
    protected function getRanks()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:SmRank');


        $ranks = $repository->findAll();
                       
        
        
        if ($ranks == null)
        {
            return null;
        }

        $rankNames = array();
        foreach($ranks as $rank)
        {
            $rankNames[] = $rank->getName();
        }
        
        return $rankNames;
    }
}

