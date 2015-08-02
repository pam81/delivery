<?php
 
namespace Backend\AdminBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityRepository;

 
class ZonaSubscriber implements EventSubscriberInterface
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
 
    private function addZonaForm($form, $zona)
    {
        $form->add($this->factory->createNamed('zona', 'entity', $zona, array(
            'class'         => 'BackendAdminBundle:Zona',
            'auto_initialize' => false,
            'empty_value'   => 'Seleccione zona',
            'query_builder' => function (EntityRepository $repository) {
                $qb = $repository->createQueryBuilder('zona')
                                  ->orderBy('zona.name');
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
        
        $zona = ($data->getBarrio()) ? $data->getBarrio()->getZona() : null ;
        
        $this->addZonaForm($form, $zona);
    }
 
    public function preBind(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
 
        $zona = array_key_exists('zona', $data) ? $data['zona'] : null;
        $this->addZonaForm($form, $zona);
    }
}
