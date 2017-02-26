<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="CHATLOG")
 */
class ChatLog
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
    protected $CHATSTRING;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $LOGDATE;
    
    /**
     * @ORM\Column(type="string")
     */    
    protected $RECIEVER;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $SENDER;
        
    public function getLine()
    {
        return $this->line;
    }
    
    public function getChatString()
    {
        return $this->CHATSTRING;
    }
    
    public function getLogDate()
    {
        return $this->LOGDATE;
    }
    
       
    public function getReciever()
    {
        return $this->RECIEVER;

    }
    
    public function getSender()
    {
        return $this->SENDER;

    }
}
