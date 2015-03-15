<?php
// src/ws/wsAppBundle/Entity/WsUser.php
namespace ws\wsAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="WsUser")
 * @UniqueEntity(fields="email", message="Email bereits registriert")
 */
class WsUser
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
    protected $name;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $firstname;
    
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(max = 4096)
     */
    protected $pwd;
    
    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $nlId;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $regDate;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $lastLogin;

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
     * Set name
     *
     * @param string $name
     * @return WsUser
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

    /**
     * Set pwd
     *
     * @param string $pwd
     * @return WsUser
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;

        return $this;
    }

    /**
     * Get pwd
     *
     * @return string 
     */
    public function getPwd()
    {
        return $this->pwd;
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
     * Set regDate
     *
     * @param \DateTime $regDate
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
     * @return \DateTime 
     */
    public function getRegDate()
    {
        return $this->regDate;
    }

    /**
     * Set lastLogin
     *
     * @param \DateTime $lastLogin
     * @return WsUser
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    /**
     * Get lastLogin
     *
     * @return \DateTime 
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return WsUser
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname 
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }
}
