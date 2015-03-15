<?php

namespace ws\wsAppBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

use ws\wsAppBundle\Entity\WsUser;

class Registration
{
    /**
     * @Assert\Type(type="ws\wsAppBundle\Entity\WsUser")
     * @Assert\Valid()
     */
    protected $wsuser;

    /**
     * @Assert\NotBlank()
     * @Assert\True()
     */
    protected $termsAccepted;

    public function setWsUser(WsUser $wsuser)
    {
        $this->wsuser = $wsuser;
    }

    public function getWsUser()
    {
        return $this->wsuser;
    }

    public function getTermsAccepted()
    {
        return $this->termsAccepted;
    }

    public function setTermsAccepted($termsAccepted)
    {
        $this->termsAccepted = (Boolean) $termsAccepted;
    }
}