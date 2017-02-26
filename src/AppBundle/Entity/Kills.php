<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="KILLDB")
 */
class Kills
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
    protected $KILLER;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $KILLTIME;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $VICTIM;

        
    public function getLine()
    {
        return $this->line;
    }
    
    public function getKiller()
    {
        return $this->KILLER;
    }
    
    public function getKillTime()
    {
        return $this->KILLTIME;
    }
    
    public function getVictim()
    {
        return $this->VICTIM;
    }
}

