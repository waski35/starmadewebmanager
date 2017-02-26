<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="SERVERLOG")
 */
class Log
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
    protected $LOGDATE;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $LOGSTRING;
    
        
    public function getLine()
    {
        return $this->line;
    }
    
    public function getLogDate()
    {
        return $this->LOGDATE;
    }
    
    public function getLogString()
    {
        return $this->LOGSTRING;
    }
}
