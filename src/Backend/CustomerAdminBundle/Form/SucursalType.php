<?php

namespace Backend\CustomerAdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use Backend\AdminBundle\Form\EventListener\CategoriaSubscriber;
use Backend\AdminBundle\Form\EventListener\SubcategoriaSubscriber;


class SucursalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)

    {
      $customerId = $options['customerId'];
    
          
			$builder->add('name','text');
			$builder->add('phone','text');
			$builder->add('email','email');
			$builder->add('website','text');
			$builder->add('cuit');
			$builder->add('file', 'file', array("required" => false));
			$builder->add('direccion','entity',array(
          'class'=>'BackendCustomerAdminBundle:Direccion',
          'query_builder'=>function(EntityRepository $er ) use ( $customerId ) {
           return $er->createQueryBuilder('u')
                  ->innerJoin('u.customers','c')
                  ->where('c.id = '.$customerId)
                  ->orderBy('u.calle', 'ASC');
            },

          'multiple'=>false
      ));
      $builder->add('paymethods','entity',array(
          'class'=>'BackendAdminBundle:PayMethod',
          'property'=>'name',
          'multiple'=>true
      ));
      
      $builder->add('open','checkbox',array(
       'value'=>1,
       'label'=>"Open 24 hs",
       'required'=>false
      ));            
			    
      $builder->add('is_active','checkbox',array(
       'value'=>1,
       'label'=>"Activa",
             'required'=>false
      ));
            
	    $builder->add('radio');
  
            
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Backend\CustomerAdminBundle\Entity\Sucursal',
            'customerId' => null

        ));
        
    }

    public function getName()
    {
        return 'backend_customeradminbundle_sucursaltype';
    }
}
