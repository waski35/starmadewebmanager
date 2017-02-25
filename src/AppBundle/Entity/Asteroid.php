<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="ASTEROIDDB")
 */
class Asteroid
{
    /**
     * @ORM\Column(type="integer", name="line")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $line;
    
    protected $CURRENTSECTOR;
    
    protected $LASTPOSITION;
    
    protected $NAME;
    
        
    public function getLine()
    {
        return $this->line;
    }
    
    public function getCurrentSector()
    {
        return $this->CURRENTSECTOR;
    }
    
    public function getName()
    {
        return $this->NAME;
    }
    
    public function getLastPosition()
    {
        return $this->LASTPOSITION;
    }
}

