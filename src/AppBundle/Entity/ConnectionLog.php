<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="GUESTBOOK")
 */
class ConnectionLog
{
    /**
     * @ORM\Column(type="integer", name="line")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $line;
    
    protected $IP;
    
    protected $NAME;
    
    protected $STATUS;
    
    protected $TIME;
    
        
    public function getLine()
    {
        return $this->line;
    }
    
    public function getIp()
    {
        return $this->IP;
    }
    
    public function getName()
    {
        return $this->NAME;
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

