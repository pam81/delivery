<?php

namespace Backend\CustomerAdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Backend\AdminBundle\Form\EventListener\CategoriaSubscriber;
use Backend\AdminBundle\Form\EventListener\SubcategoriaSubscriber;
use Doctrine\ORM\EntityRepository;

class HorarioType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('dia', 'entity',array(
        'class'=>'BackendAdminBundle:Dia',
        'query_builder' => function(EntityRepository $er) {
            return $er->createQueryBuilder("u")
                     ->select("u")
                     //->where("u.is_active = true")
                     ->orderBy('u.id', 'ASC');
                  
        },'mapped'=>true,'required'=>true,'multiple'=>false))
			->add('desde')
            ->add('hasta')           
        	->add('cerrado')	
          ;            
            
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Backend\AdminBundle\Entity\Horario'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'backend_customeradminbundle_horario';
    }
}
