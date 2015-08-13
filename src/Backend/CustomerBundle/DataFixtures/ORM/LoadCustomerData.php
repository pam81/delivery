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
        $userAdmin = new customer();
        $userAdmin->setPassword("123456");
        $userAdmin->setEmail('customer@admin.com');
        $userAdmin->setName("Customer");
        $userAdmin->setLastname("CustomerLast");
        $userAdmin->setStatus($this->getReference('status-pendiente'));
        $userAdmin->setIsActive("1");
        $userAdmin->setIsComercio("0");
        $userAdmin->setCreatedAt(new \DateTime('now'));
        $userAdmin->addGroup($this->getReference('visitor-group'));
        $manager->persist($userAdmin);
        $manager->flush();
        $this->addReference('customer-one', $userAdmin);
    }
    
    public function getOrder()
    {
        return 7; // the order in which fixtures will be loaded
    }
    
}
