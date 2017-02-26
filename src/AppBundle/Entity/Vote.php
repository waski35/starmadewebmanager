<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="VOTELOG")
 */
class Vote
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
    protected $INFO;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $NAME;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $TIME;
    
    public function getLine()
    {
        return $this->line;
    }
    
    public function getInfo()
    {
        return $this->INFO;
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

