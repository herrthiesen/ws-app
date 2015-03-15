<?php

namespace ws\wsAppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', 'email');
        $builder->add('pwd', 'repeated', array(
           'firstname'  => 'password',
           'name' => 'confirm',
           'type'        => 'password',
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ws\wsAppBundle\Entity\WsUser'
        ));
    }

    public function getName()
    {
        return 'wsuser';
    }
}