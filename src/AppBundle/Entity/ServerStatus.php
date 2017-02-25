<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="SERVERSTATUS")
 */
class ServerStatus
{
    /**
     * @ORM\Column(type="integer", name="line")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $line;
    
    protected $STATUS;
    
    protected $TIME;
    
        
    public function getLine()
    {
        return $this->line;
    }
    
    public function getStatus()
    {
        return $this->STATUS;
    }
    
    public function getTime()
    {
        return $this->TIME;
    }
}

