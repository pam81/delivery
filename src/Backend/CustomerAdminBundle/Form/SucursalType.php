<?php

namespace Backend\CustomerAdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SucursalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  
            $myCustomVar = $options['user'];
			
			$builder->add('name','text',array('required'=>true));
			$builder->add('phone','text',array('required'=>true));
			$builder->add('email','email');
			$builder->add('website','text');
			$builder->add('cuit','text',array('required'=>true));
            /*
            $builder->add('direccion','entity',array(
                'class'=>'BackendCustomerAdminBundle:Direccion',
                //'property'=>'calle',
                'multiple'=>false
            ));
            */
            
            $builder->add('direccion', 'entity',array(
            'class'=>'BackendCustomerAdminBundle:Direccion',
            'mapped'=>true,
            'required'=>true,
            function(EntityRepository $er) use ($user){
                $qb = $er->createQueryBuilder("u")
                          ->innerJoin('u.customers', 'c')
                          ->where('c.id = :user_id')
                          ->setParameter('user_id', $user)
						  ->orderBy('u.name', 'ASC');		
				return $qb;		  	                      
            }));
            
            $builder->add('paymethods','entity',array(
                'class'=>'BackendAdminBundle:PayMethod',
                'property'=>'name',
                'multiple'=>true
            ));
            $builder->add('categorias','entity',array(
                'class'=>'BackendAdminBundle:Categoria',
                //'property'=>'calle',
                'multiple'=>true
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
            'data_class' => 'Backend\CustomerAdminBundle\Entity\Sucursal',
            
        ));
        
        $resolver->setNormalizers(array(
                  'query_builder' => function (Options $options, $configs) {
                          return function (EntityRepository $er) use ( $options ) {
                              return $er->getSomething( $options['user'] );

                       };
                  },
        ));
    }

    public function getName()
    {
        return 'backend_customeradminbundle_sucursaltype';
    }
}
