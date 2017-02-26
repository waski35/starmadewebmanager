<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="SHIPDB")
 */
class Ship
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
    protected $ATTACHED;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $BLOCK;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $CREATOR;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $CURRENTSECTOR;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $DOCKED;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $ENTITYTYPE;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $FACTION;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $LASTCONTROLLER;
    
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
    protected $MASS;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $NAME;
    
        
    public function getLine()
    {
        return $this->line;
    }
    
    public function getAttached()
    {
        return $this->ATTACHED;
    }
    
    public function getName()
    {
        return $this->NAME;
    }
    
    public function getBlock()
    {
        return $this->BLOCK;
    }
    
    public function getCreator()
    {
        return $this->CREATOR;
    }
    
    public function getCurrentSector()
    {
        return $this->CURRENTSECTOR;
    }
    
    public function getDocked()
    {
        return $this->DOCKED;
    }
    
    public function getEntityType()
    {
        return $this->ENTITYTYPE;
    }
    
    public function getFaction()
    {
        return $this->FACTION;
    }
    
    public function getLastController()
    {
        return $this->LASTCONTROLLER;
    }
    
    public function getLastPosition()
    {
        return $this->LASTPOSITION;
    }
    
    public function getLastUpdate()
    {
        return $this->LASTUPDATE;
    }
    
    public function getMass()
    {
        return $this->MASS;
    }
    
}

