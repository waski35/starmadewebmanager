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
    
    /**
     * @ORM\Column(type="string")
     */
    protected $IP;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $NAME;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $STATUS;
    
    /**
     * @ORM\Column(type="string")
     */
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

