<?php 
namespace Backend\CustomerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Backend\CustomerBundle\Entity\Customer;

class LoadCustomerData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        $customer = new customer();
        $customer->setPassword("123456");
        $customer->setEmail('customer@admin.com');
        $customer->setName("Customer");
        $customer->setLastname("CustomerLast");
        $customer->setStatus($this->getReference('status-pendiente'));
        $customer->setIsActive("1");
        $customer->setIsComercio("0");
        $customer->setCreatedAt(new \DateTime('now'));
        $customer->addGroup($this->getReference('cliente-group'));
        $manager->persist($customer);
        $manager->flush();
        $this->addReference('customer-one', $customer);
        
        $customer1 = new customer();
        $customer1->setPassword("123456");
        $customer1->setEmail('bambola@admin.com');
        $customer1->setName("La Bambola");
        $customer1->setLastname("");
        $customer1->setStatus($this->getReference('status-pendiente'));
        $customer1->setIsActive("1");
        $customer1->setIsComercio("0");
        $customer1->setCreatedAt(new \DateTime('now'));
        $customer1->addGroup($this->getReference('comercio-group'));
        $manager->persist($customer1);
        $manager->flush();
        $this->addReference('customer-two', $customer1);
        
        
    }
    
    public function getOrder()
    {
        return 7; // the order in which fixtures will be loaded
    }
    
}
