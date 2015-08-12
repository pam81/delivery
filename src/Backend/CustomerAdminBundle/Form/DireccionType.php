<?php

namespace Backend\CustomerAdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class DireccionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
            
            $builder->add('calle', 'text');
            $builder->add('numero','text');
            $builder->add('piso');
            $builder->add('depto');
            $builder->add('zip','text');
            $builder->add('zona','entity',array(
                'class'=>'BackendAdminBundle:Zona',
                'property'=>'name',
                'multiple'=>false
            ));
            $builder->add('barrio','entity',array(
                'class'=>'BackendAdminBundle:Barrio',
                'property'=>'name',
                'multiple'=>false
            ));
            $builder->add('tipo','entity',array(
                'class'=>'BackendCustomerAdminBundle:TipoDireccion',
                'property'=>'name',
                'multiple'=>false
            ));
            $builder->add('isDefault','checkbox',array(
             'value'=>1,
             'label'=>"Direccion por defecto",
             'required'=>false
            ));
				
		  
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Backend\CustomerAdminBundle\Entity\Direccion'
        ));
    }

    public function getName()
    {
        return 'backend_customeradminbundle_direccion';
    }
}
