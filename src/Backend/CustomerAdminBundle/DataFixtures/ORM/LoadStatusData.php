<?php 
namespace Backend\CustomerAdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Backend\CustomerAdminBundle\Entity\Status;

class LoadStatusData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{

/**
     * @var ContainerInterface
     */
    private $container;

 public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $tipo1 = new Status();
        $tipo1->setName("Pendiente");
        $manager->persist($tipo1);
        $manager->flush();
        $this->addReference('status-pendiente', $tipo1);
        
        $tipo2 = new Status();
        $tipo2->setName("Procesando");
        $manager->persist($tipo2);
        $manager->flush();
        $this->addReference('status-procesando', $tipo2);
        
        $tipo3 = new Status();
        $tipo3->setName("Enviado");
        $manager->persist($tipo3);
        $manager->flush();
        $this->addReference('status-enviado', $tipo3);
        
        $tipo4 = new Status();
        $tipo4->setName("Entregado");
        $manager->persist($tipo4);
        $manager->flush();
        $this->addReference('status-entregado', $tipo4);
        
        $tipo5 = new Status();
        $tipo5->setName("Cancelado");
        $manager->persist($tipo5);
        $manager->flush();
        $this->addReference('status-cancelado', $tipo5);
        
       
    }
    
    public function getOrder()
    {
        return 10; // the order in which fixtures will be loaded
    }
    
}
