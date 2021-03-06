<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="SHOPDB")
 */
class Shop
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
    protected $CURRENTSECTOR;
    
    /**
     * @ORM\Column(type="string")
     */
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
}

