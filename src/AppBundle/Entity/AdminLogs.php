<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="ADMINLOG")
 */
class AdminLogs
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
    private $COMMAND;
    
    /**
     * @ORM\Column(type="string")
     */
    private $NAME;
   
    /**
     * @ORM\Column(type="string")
     */
    private $TIME;
    
        
    public function getLine()
    {
        return $this->line;
    }
    
    public function getCommand()
    {
        return $this->COMMAND;
    }
    
    public function getName()
    {
        return $this->NAME;
    }
      
    public function getTime()
    {
        return $this->TIME;

    }
}

