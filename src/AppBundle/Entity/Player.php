<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="PLAYERDB")
 */
class Player
{
    /**
     * @ORM\Column(type="integer", name="line")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $line;
    
    protected $BANKCREDITS;
    
    protected $CONTROLLING;
    
    protected $CONTROLTYPE;
    
    protected $CREDITS;
    
    protected $CURRENTIP;
    
    protected $CURRENTSECTOR;
    
    protected $FACTION;
    
    protected $LASTCORE;
    
    protected $LASTPOSITION;
    
    protected $LASTUPDATE;
    
    protected $NAME;
    
    protected $ONLINE;
    
    protected $RANK;
        
    public function getLine()
    {
        return $this->line;
    }
    
    public function getBankCredits()
    {
        return $this->BANKCREDITS;
    }
    
    public function getControlling()
    {
        return $this->CONTROLLING;
    }
    
    public function getControlType()
    {
        return $this->CONTROLTYPE;
    }
    
    public function getCredits()
    {
        return $this->CREDITS;
    }
    
    public function getCurrentIp()
    {
        return $this->CURRENTIP;
    }
    
    public function getCurrentSector()
    {
        return $this->CURRENTSECTOR;
    }
    
    public function getFaction()
    {
        return $this->FACTION;
    }
    
    public function getLastCore()
    {
        return $this->LASTCORE;
    }
    
    public function getLastPosition()
    {
        return $this->LASTPOSITION;
    }
    
    public function getLastUpdate()
    {
        return $this->LASTUPDATE;
    }
    
    public function getName()
    {
        return $this->NAME;
    }
    
    public function getOnLine()
    {
        return $this->ONLINE;
    }
    
    public function getRank()
    {
        return $this->RANK;
    }
}

