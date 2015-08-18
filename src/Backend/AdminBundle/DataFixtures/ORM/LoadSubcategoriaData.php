<?php 

namespace Backend\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Backend\AdminBundle\Entity\Subcategoria;

class LoadSubcategoriaData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $subcategoria = new Subcategoria();
        $subcategoria->setName('TV');
        $subcategoria->setCategoria($this->getReference('categoria-electronica'));
        $manager->persist($subcategoria);
        $manager->flush();
        $this->addReference('subcategoria-tv', $subcategoria);
        
        $subcategoria2 = new Subcategoria();
        $subcategoria2->setName('PLAY');
        $subcategoria2->setCategoria($this->getReference('categoria-electronica'));
        $manager->persist($subcategoria2);
        $manager->flush();
        $this->addReference('subcategoria-play', $subcategoria2);

        $subcategoria3 = new Subcategoria();
        $subcategoria3->setName('Restaurantes');
        $subcategoria3->setCategoria($this->getReference('categoria-comida'));
        $manager->persist($subcategoria3);
        $manager->flush();
        $this->addReference('subcategoria-restaurantes', $subcategoria3);        
        
     
        
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 9; // the order in which fixtures will be loaded
    }
}
