<?php
 
namespace Backend\AdminBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityRepository;

 
class CategoriaSubscriber implements EventSubscriberInterface
{
    private $factory;
 
    public function __construct(FormFactoryInterface $factory)
    {
        $this->factory = $factory;
    }
 
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_BIND     => 'preBind'
        );
    }
 
    private function addCategoriaForm($form, $categoria)
    {
        $form->add($this->factory->createNamed('categoria', 'entity', $categoria, array(
            'class'         => 'BackendAdminBundle:Categoria',
            'auto_initialize' => false,
            'empty_value'   => 'Seleccione categoria',
            'query_builder' => function (EntityRepository $repository) {
                $qb = $repository->createQueryBuilder('categoria')
                                  ->orderBy('categoria.name');
                return $qb;
            }
        )));
    }
 
    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
        
        $categoria = ($data->getSubcategoria()) ? $data->getSubcategoria()->getCategoria() : null ;
        
        $this->addCategoriaForm($form, $categoria);
    }
 
    public function preBind(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
 
        $categoria = array_key_exists('categoria', $data) ? $data['categoria'] : null;
        $this->addCategoriaForm($form, $categoria);
    }
}
