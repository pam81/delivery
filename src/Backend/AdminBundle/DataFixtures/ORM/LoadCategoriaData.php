<?php 

namespace Backend\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Backend\AdminBundle\Entity\Categoria;

class LoadCategoriaData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $categoria = new Categoria();
        $categoria->setName('Electrónica');
        $manager->persist($categoria);
        $manager->flush();
        $this->addReference('categoria-electronica', $categoria);
        
        $categoria2 = new Categoria();
        $categoria2->setName('Comida');
        $manager->persist($categoria2);
        $manager->flush();
        $this->addReference('categoria-comida', $categoria2);
        
        $categoria3 = new Categoria();
        $categoria3->setName('Indumentaria');
        $manager->persist($categoria3);
        $manager->flush();
        $this->addReference('categoria-indumentaria', $categoria3);
                
        
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 8; // the order in which fixtures will be loaded
    }
}


