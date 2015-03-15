<?php
namespace ws\wsAppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\Common\Persistence\ObjectManager;
   
class AddPartnerForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {        
        $builder
            ->setAction('/partner/create/')
            ->setMethod('POST')
            ->add('nlId')
            ->add('nlIdOver')
            ->add('nick')
            ->add('email', 'text', array('required' => false))
            ->add('regDate', 'date', array('required' => false))
            ->add('scrimps', 'checkbox', array('required' => false))
            ->add('qualifiedL', 'checkbox', array('required' => false))
            ->add('qualifiedR', 'checkbox', array('required' => false))
            ->add('installment', 'checkbox', array('required' => false))
            ->add('type', 'text', array('required' => false))
            ->add('level', 'number', array('required' => false))
            ->add('name', 'text', array('required' => false))
            ->add('save', 'submit', array(
                'attr' => array('class' => 'post')))
            ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ws\wsAppBundle\Entity\Partner'
        ));
    }
    public function getName()
    {
        return 'ws_wsappbundle_addPartnerForm';
    }
}