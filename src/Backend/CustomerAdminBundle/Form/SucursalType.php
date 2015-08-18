<?php

namespace Backend\CustomerAdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SucursalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
          
			$builder->add('name','text');
			$builder->add('phone','text');
			$builder->add('email','email');
			$builder->add('website','text');
			$builder->add('cuit');
            $builder->add('direccion','entity',array(
                'class'=>'BackendCustomerAdminBundle:Direccion',
                //'property'=>'calle',
                'multiple'=>false
            ));
            $builder->add('open','checkbox',array(
             'value'=>1,
             'label'=>"Open 24 hs",
             'required'=>false
            ));
            
			$builder->add('is_unica','checkbox',array(
             'value'=>1,
             'label'=>"Unica sucursal",
             'required'=>false
            ));
            $builder->add('is_active','checkbox',array(
             'value'=>1,
             'label'=>"Activa",
             'required'=>false
            ));
			                
            
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Backend\CustomerAdminBundle\Entity\Sucursal'
        ));
    }

    public function getName()
    {
        return 'backend_customeradminbundle_sucursaltype';
    }
}
