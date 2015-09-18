<?php

namespace Backend\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
          
            $builder->add('name', 'text');
            $builder->add('lastname','text');
            $builder->add('email','email');
             $builder->add('phone');
            $builder->add('dni');
            $builder->add('birthday','date', array(
                'input'=> "string",
                'format' => 'dd-MM-yyyy',
                'years'=> range(date('Y') -100, date('Y'))
            ));
            $builder->add('phone');
           
            
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Backend\UserBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'backend_userbundle_profiletype';
    }
}
