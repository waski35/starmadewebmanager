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
    
    /**
     * @ORM\Column(type="string")
     */
    protected $BANKCREDITS;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $CONTROLLING;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $CONTROLTYPE;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $CREDITS;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $CURRENTIP;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $CURRENTSECTOR;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $FACTION;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $LASTCORE;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $LASTPOSITION;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $LASTUPDATE;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $NAME;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $ONLINE;
    
    /**
     * @ORM\Column(type="string")
     */
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

