<?php
// src/ws/wsAppBundle/Entity/Partner.php
namespace ws\wsAppBundle\Entity; 

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Partner")
 */
class Partner
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
    protected $nlId;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $nlIdOver;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $nick;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $email;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $regDate;
    
    /**
     * @ORM\Column(type="boolean")
     */
    protected $scrimps;
    
    /**
     * @ORM\Column(type="boolean")
     */
    protected $qualifiedL;
    
    /**
     * @ORM\Column(type="boolean")
     */
    protected $qualifiedR;
    
    /**
     * @ORM\Column(type="boolean")
     */
    protected $installment;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $type;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $level;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;

    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set id
     *
     */
    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }

    /**
     * Set nlId
     *
     * @param string $nlId
     * @return WsUser
     */
    public function setNlId($nlId)
    {
        $this->nlId = $nlId;

        return $this;
    }

    /**
     * Get nlId
     *
     * @return string 
     */
    public function getNlId()
    {
        return $this->nlId;
    }
    
    /**
     * Set nlIdOver
     *
     * @param string $nlIdOver
     * @return WsUser
     */
    public function setNlIdOver($nlIdOver)
    {
        $this->nlIdOver = $nlIdOver;

        return $this;
    }

    /**
     * Get nlIdOver
     *
     * @return string 
     */
    public function getNlIdOver()
    {
        return $this->nlIdOver;
    }
    
    /**
     * Set email
     *
     * @param string $email
     * @return WsUser
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * Set regDate
     *
     * @param string $regDate
     * @return WsUser
     */
    public function setRegDate($regDate)
    {
        $this->regDate = $regDate;

        return $this;
    }

    /**
     * Get regDate
     *
     * @return string 
     */
    public function getRegDate()
    {
        return $this->regDate;
    }

    /**
     * Set nick
     *
     * @param string $nick
     * @return Partner
     */
    public function setNick($nick)
    {
        $this->nick = $nick;

        return $this;
    }

    /**
     * Get nick
     *
     * @return string 
     */
    public function getNick()
    {
        return $this->nick;
    }

    /**
     * Set scrimps
     *
     * @param boolean $scrimps
     * @return Partner
     */
    public function setScrimps($scrimps)
    {
        $this->scrimps = $scrimps;

        return $this;
    }

    /**
     * Get scrimps
     *
     * @return boolean 
     */
    public function getScrimps()
    {
        return $this->scrimps;
    }

    /**
     * Set qualifiedL
     *
     * @param boolean $qualifiedL
     * @return Partner
     */
    public function setQualifiedL($qualifiedL)
    {
        $this->qualifiedL = $qualifiedL;

        return $this;
    }

    /**
     * Get qualifiedL
     *
     * @return boolean 
     */
    public function getQualifiedL()
    {
        return $this->qualifiedL;
    }

    /**
     * Set qualifiedR
     *
     * @param boolean $qualifiedR
     * @return Partner
     */
    public function setQualifiedR($qualifiedR)
    {
        $this->qualifiedR = $qualifiedR;

        return $this;
    }

    /**
     * Get qualifiedR
     *
     * @return boolean 
     */
    public function getQualifiedR()
    {
        return $this->qualifiedR;
    }

    /**
     * Set installment
     *
     * @param integer $installment
     * @return Partner
     */
    public function setInstallment($installment)
    {
        $this->installment = $installment;

        return $this;
    }

    /**
     * Get installment
     *
     * @return integer 
     */
    public function getInstallment()
    {
        return $this->installment;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Partner
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set level
     *
     * @param integer $level
     * @return Partner
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return \integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Partner
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
}
