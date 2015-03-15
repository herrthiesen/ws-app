<?php
// src/ws/wsAppBundle/Entity/Links.php
namespace ws\wsAppBundle\Entity; 

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Links")
 */
class Links
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $parent;
    
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $child;
    
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $level;
    

    /**
     * Set parent
     *
     * @param string $parent
     * @return Links
     */
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return string 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set child
     *
     * @param string $child
     * @return Links
     */
    public function setChild($child)
    {
        $this->child = $child;

        return $this;
    }

    /**
     * Get child
     *
     * @return string 
     */
    public function getChild()
    {
        return $this->child;
    }

    /**
     * Set level
     *
     * @param integer $level
     * @return Links
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
