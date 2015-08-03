<?php 
namespace Backend\CustomerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Backend\UserBundle\Entity\Customer;

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
        $userCustomer = new Customer();
        $userCustomer->setPassword("123456");
        $userCustomer->setEmail('customer@customer.com');
        $userCustomer->setName("Customer");
        $userCustomer->setLastname("Customer");
        $userCustomer->setIsActive("1");
        $userCustomer->setCreatedAt(new \DateTime('now'));
        $userCustomer->addGroup($this->getReference('admin-group'));
        $manager->persist($userCustomer);
        $manager->flush();
        $this->addReference('admin-user', $userCustomer);
    }
    
    public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }
    
}
