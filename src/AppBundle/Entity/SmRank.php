<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="RANKLOG")
 */
class SmRank
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
    protected $COMMANDSALLOWED;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $NAME;
        
    public function getLine()
    {
        return $this->line;
    }
    
    public function getCommandsAllowed()
    {
        return $this->COMMANDSALLOWED;
    }
    
    public function getName()
    {
        return $this->NAME;
    }
}

