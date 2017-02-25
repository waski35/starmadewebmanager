<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="BOUNTYDB")
 */
class Bounty
{
    /**
     * @ORM\Column(type="integer", name="line")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $line;
    
    protected $BOUNTY;
    
    protected $DEATHS;
    
    protected $KILLEDBY;
    
    protected $KILLS;
    
    protected $LASTKILL;
    
    protected $NAME;
        
    public function getLine()
    {
        return $this->line;
    }
    
    public function getBounty()
    {
        return $this->BOUNTY;
    }
    
    public function getName()
    {
        return $this->NAME;
    }
    
    public function getDeaths()
    {
        return $this->DEATHS;
    }
    
    public function getKilledBy()
    {
        return $this->KILLEDBY;
    }
    
    public function getKills()
    {
        return $this->KILLS;
    }
    
    public function getLastKill()
    {
        return $this->LASTKILL;
    }
}