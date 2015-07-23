<?php 

namespace Backend\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Backend\AdminBundle\Entity\Zona;

class LoadZonaData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $zona = new Zona();
        $zona->setName('Buenos Aires');
        $manager->persist($zona);
        $manager->flush();
        $this->addReference('zona-bsas', $zona);
        
        
        $zona1 = new Zona();
        $zona1->setName('Catamarca');
        $manager->persist($zona1);
        $manager->flush();
        $this->addReference('zona-catamarca', $zona1);
        
        $zona2 = new Zona();
        $zona2->setName('Chaco');
        $manager->persist($zona2);
        $manager->flush();
        $this->addReference('zona-chaco', $zona2);
        
        $zona3 = new Zona();
        $zona3->setName('Chubut');
        $manager->persist($zona3);
        $manager->flush();
        $this->addReference('zona-chubut', $zona3);
        
        $zona4 = new Zona();
        $zona4->setName('Córdoba');
        $manager->persist($zona4);
        $manager->flush();
        $this->addReference('zona-cordoba', $zona4);
        
        $zona5 = new Zona();
        $zona5->setName('Corrientes');
        $manager->persist($zona5);
        $manager->flush();
        $this->addReference('zona-corrientes', $zona5);
        
        $zona6 = new Zona();
        $zona6->setName('Ciudad Autónoma de Buenos Aires');
        $manager->persist($zona6);
        $manager->flush();
        $this->addReference('zona-capfed', $zona6);
        
        $zona7 = new Zona();
        $zona7->setName('Entre Ríos');
        $manager->persist($zona7);
        $manager->flush();
        $this->addReference('zona-entrerios', $zona7);
        
        $zona8 = new Zona();
        $zona8->setName('Formosa');
        $manager->persist($zona8);
        $manager->flush();
        $this->addReference('zona-formosa', $zona8);
        
        $zona9 = new Zona();
        $zona9->setName('Jujuy');
        $manager->persist($zona9);
        $manager->flush();
        $this->addReference('zona-jujuy', $zona9);
        
        $zona10 = new Zona();
        $zona10->setName('La Pampa');
        $manager->persist($zona10);
        $manager->flush();
        $this->addReference('zona-pampa', $zona10);
        
        $zona11 = new Zona();
        $zona11->setName('La Rioja');
        $manager->persist($zona11);
        $manager->flush();
        $this->addReference('zona-rioja', $zona11);
        
        $zona12 = new Zona();
        $zona12->setName('Mendoza');
        $manager->persist($zona12);
        $manager->flush();
        $this->addReference('zona-mendoza', $zona12);
        
        $zona13 = new Zona();
        $zona13->setName('Misiones');
        $manager->persist($zona13);
        $manager->flush();
        $this->addReference('zona-misiones', $zona13);
        
        $zona14 = new Zona();
        $zona14->setName('Neuquén');
        $manager->persist($zona14);
        $manager->flush();
        $this->addReference('zona-neuquen', $zona14);
        
        $zona15 = new Zona();
        $zona15->setName('Río Negro');
        $manager->persist($zona15);
        $manager->flush();
        $this->addReference('zona-rionegro', $zona15);
        
        $zona16 = new Zona();
        $zona16->setName('Salta');
        $manager->persist($zona16);
        $manager->flush();
        $this->addReference('zona-salta', $zona16);
        
        $zona17 = new Zona();
        $zona17->setName('San Juan');
        $manager->persist($zona17);
        $manager->flush();
        $this->addReference('zona-sanjuan', $zona17);
        
        $zona18 = new Zona();
        $zona18->setName('San Luis');
        $manager->persist($zona18);
        $manager->flush();
        $this->addReference('zona-sanluis', $zona18);
        
        $zona19 = new Zona();
        $zona19->setName('Santa Cruz');
        $manager->persist($zona19);
        $manager->flush();
        $this->addReference('zona-santacruz', $zona19);
        
        $zona20 = new Zona();
        $zona20->setName('Santa Fe');
        $manager->persist($zona20);
        $manager->flush();
        $this->addReference('zona-santafe', $zona20);
        
        $zona21 = new Zona();
        $zona21->setName('Santiago del Estero');
        $manager->persist($zona21);
        $manager->flush();
        $this->addReference('zona-santiago', $zona21);
        
             
        $zona22 = new Zona();
        $zona22->setName('Tierra del Fuego');
        $manager->persist($zona22);
        $manager->flush();
        $this->addReference('zona-tierra', $zona22);
        
             
        $zona23 = new Zona();
        $zona23->setName('Tucumán');
        $manager->persist($zona23);
        $manager->flush();
        $this->addReference('zona-tucuman', $zona23);
        
        $zona24 = new Zona();
        $zona24->setName('Uruguay');
        $manager->persist($zona24);
        $manager->flush();
        $this->addReference('zona-uruguay', $zona24);
        
        $zona25 = new Zona();
        $zona25->setName('Noroeste GBA');
        $manager->persist($zona25);
        $manager->flush();
        $this->addReference('zona-noroestegba', $zona25);
        
        $zona26 = new Zona();
        $zona26->setName('Norte GBA');
        $manager->persist($zona26);
        $manager->flush();
        $this->addReference('zona-nortegba', $zona26);
        
        $zona27 = new Zona();
        $zona27->setName('Oeste GBA');
        $manager->persist($zona27);
        $manager->flush();
        $this->addReference('zona-oestegba', $zona27);
        
        $zona28 = new Zona();
        $zona28->setName('Sur GBA');
        $manager->persist($zona28);
        $manager->flush();
        $this->addReference('zona-surgba', $zona28);
        
        
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 5; // the order in which fixtures will be loaded
    }
}


