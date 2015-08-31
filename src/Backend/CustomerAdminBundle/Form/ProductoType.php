<?php

namespace Backend\CustomerAdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Backend\AdminBundle\Form\EventListener\CategoriaSubscriber;
use Backend\AdminBundle\Form\EventListener\SubcategoriaSubscriber;
use Doctrine\ORM\EntityRepository;

class ProductoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('code')
            ->add('file', 'file', array("required" => false))
            ->add('sucursales', 'entity',array(
            'class'=>'BackendCustomerAdminBundle:Sucursal',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder("u")
                         ->select("u")
                         ->where("u.is_active = true")
                         ->orderBy('u.name', 'ASC');
                      
            },'mapped'=>true,'required'=>true,'multiple'=>true))	
            ->add('precio')
            ->add('alwaysAvailable')
            ->add('description')
            ;
            
          
           $categoriaSubscriber = new CategoriaSubscriber($builder->getFormFactory());
			     $builder->addEventSubscriber($categoriaSubscriber); 
           
           $subcategoriaSubscriber = new SubcategoriaSubscriber($builder->getFormFactory());
			     $builder->addEventSubscriber($subcategoriaSubscriber);  
            
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Backend\CustomerAdminBundle\Entity\Producto'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'backend_adminbundle_producto';
    }
}
