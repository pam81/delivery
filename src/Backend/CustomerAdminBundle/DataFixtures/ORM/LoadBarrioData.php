<?php 

namespace Backend\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Backend\AdminBundle\Entity\Barrio;

class LoadBarrioData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $barrio = new Barrio();
        $barrio->setName('AGRONOMIA');
        $barrio->setZona($this->getReference('zona-capfed'));
        $manager->persist($barrio);
        $manager->flush();
        $this->addReference('barrio-agronomia', $barrio);
        
        $barrio1 = new Barrio();
        $barrio1->setName('ALMAGRO');
        $barrio1->setZona($this->getReference('zona-capfed'));
        $manager->persist($barrio1);
        $manager->flush();
        $this->addReference('barrio-almagro', $barrio1);
        
        $barrio2 = new Barrio();
        $barrio2->setName('MATADEROS');
        $barrio2->setZona($this->getReference('zona-capfed'));
        $manager->persist($barrio2);
        $manager->flush();
        $this->addReference('barrio-mataderos', $barrio2);
        
        $barrio3 = new Barrio();
        $barrio3->setName('LINIERS');
        $barrio3->setZona($this->getReference('zona-capfed'));
        $manager->persist($barrio3);
        $manager->flush();
        $this->addReference('barrio-liniers', $barrio3);
        
        $barrio4 = new Barrio();
        $barrio4->setName('QUILMES');
        $barrio4->setZona($this->getReference('zona-surgba'));
        $manager->persist($barrio4);
        $manager->flush();
        $this->addReference('barrio-quilmes', $barrio4);
        
        $barrio5 = new Barrio();
        $barrio5->setName('AVELLANEDA');
        $barrio5->setZona($this->getReference('zona-surgba'));
        $manager->persist($barrio5);
        $manager->flush();
        $this->addReference('barrio-avellaneda', $barrio5);
        
        $barrio6 = new Barrio();
        $barrio6->setName('BERNAL');
        $barrio6->setZona($this->getReference('zona-surgba'));
        $manager->persist($barrio6);
        $manager->flush();
        $this->addReference('barrio-bernal', $barrio6);
        
        $barrio7 = new Barrio();
        $barrio7->setName('ADROGUE');
        $barrio7->setZona($this->getReference('zona-surgba'));
        $manager->persist($barrio7);
        $manager->flush();
        $this->addReference('barrio-adrogue', $barrio7);
     
        
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 6; // the order in which fixtures will be loaded
    }
}
