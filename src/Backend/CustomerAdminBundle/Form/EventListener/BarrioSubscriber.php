<?php
 
namespace Backend\AdminBundle\Form\EventListener;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityRepository;

use Backend\AdminBundle\Entity\Zona;
 
class BarrioSubscriber implements EventSubscriberInterface
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
 
    private function addBarrioForm($form, $zona)
    {
        $form->add($this->factory->createNamed('barrio','entity', null, array(
            'class'         => 'BackendAdminBundle:Barrio',
            'empty_value'   => 'Seleccione Localidad/Barrio',
            'auto_initialize' => false,
            "property"=>"name",
            "required"=>true,
            'query_builder' => function (EntityRepository $repository) use ($zona) {
                $qb = $repository->createQueryBuilder('barrio')
                       ->innerJoin('barrio.zona', 'zona');
                       
                if ($zona instanceof Zona) {
                    $qb->where('barrio.zona = :zona_id')
                    ->setParameter('zona_id', $zona);
                } elseif (is_numeric($zona)) {
                    $qb->where('zona.id = :zona_id')
                    ->setParameter('zona_id', $zona);
                } else {
                    $qb->where('zona.name = :zona_id')
                    ->setParameter('zona_id', null);
                }  
                     
                $qb->orderBy('barrio.name');
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
        $this->addBarrioForm($form, $zona);
    }
 
    public function preBind(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
 
       
        $zona = array_key_exists('zona', $data) ? $data['zona'] : null;
        $this->addBarrioForm($form, $zona);
    }
}