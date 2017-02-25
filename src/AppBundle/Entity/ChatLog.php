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
    
    protected $CHATSTRING;
    
    protected $LOGDATE;
        
    protected $RECIEVER;
    
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
