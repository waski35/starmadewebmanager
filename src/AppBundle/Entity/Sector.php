<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="SECTORDB")
 */
class Sector
{
    /**
     * @ORM\Column(type="integer", name="line")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $line;
    
    protected $LASTUPDATE;
    
    protected $NAME;
    
    protected $PEACE;
    
    protected $PROTECTED;
    
    protected $TYPE;
        
    public function getLine()
    {
        return $this->line;
    }
    
    public function getLastUpdate()
    {
        return $this->LASTUPDATE;
    }
    
    public function getName()
    {
        return $this->NAME;
    }
    
    public function getPeace()
    {
        return $this->PEACE;
    }
    
    public function getProtected()
    {
        return $this->PROTECTED;
    }
    
    public function getType()
    {
        return $this->TYPE;
    }
}

