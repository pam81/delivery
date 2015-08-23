<?php

namespace Backend\AdminBundle\Form;

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
            ->add('customer', 'entity',array(
            'class'=>'BackendCustomerBundle:Customer',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder("u")
                         ->select("u")
                         ->where("u.isActive = true")
                         ->andWhere("u.isComercio = true")
                         ->orderBy('u.name', 'ASC');
                      
            },'mapped'=>true,'required'=>false))
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
