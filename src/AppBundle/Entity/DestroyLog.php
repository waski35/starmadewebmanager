<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="DESTROYLOG")
 */
class DestroyLog
{
    /**
     * @ORM\Column(type="integer", name="line")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $line;
    
    protected $NAME;
    
    protected $TYPE;
    
    protected $DESTROYTIME;
    
        
    public function getLine()
    {
        return $this->line;
    }
    
    public function getType()
    {
        return $this->TYPE;
    }
    
    public function getName()
    {
        return $this->NAME;
    }
    
        
    public function getDestroyTime()
    {
        return $this->DESTROYTIME;
    }
}

